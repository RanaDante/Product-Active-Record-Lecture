<?php 

class Product {
    public $product_id;
    public $name;
    public $description;
    public $sku;
    public $inventory;
    public $price;
    protected static $database_columns = array('product_id', 'name', 'description', 'sku', 'inventory', 'price');

    protected static $connection;

    public function __construct($args=[]) {
        $this->product_id = !empty($args['product_id']) ? $args['product_id'] : NULL;
        $this->name = !empty($args['name']) ? $args['name'] : NULL;
        $this->description = !empty($args['description']) ? $args['description'] : NULL;
        $this->sku = !empty($args['sku']) ? $args['sku'] : NULL;
        $this->inventory = !empty($args['inventory']) ? $args['inventory'] : NULL;
        $this->price = !empty($args['price']) ? $args['price'] : NULL;
    }

    public static function set_db_connection($connection) {
        self::$connection = $connection;
    }

    protected function create() {

        $sanitized_attributes = $this->sanitized_attributes();


        $sql = "INSERT INTO products (" . join(',', array_keys($sanitized_attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($sanitized_attributes));
        $sql .= "');";

        $result = self::$connection->query($sql);

        if($result) {
            $this->product_id = self::$connection->insert_id;
        }
        return $result;
    }

    protected function update() {
        $sanitized_attributes = $this->sanitized_attributes();
        $attribute_pairs = array();
        foreach($sanitized_attributes as $key=>$value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "Update products SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= " WHERE product_id='" . $this->product_id . "' ";
        $sql .= "LIMIT 1;";

        $result = self::$connection->query($sql);

        return $result;
    }

    public function save() {
        if(isset($this->product_id)) {
            return $this->update();
        }else {
            return $this->create();
        }
    }

    public function merge_attributes($args) {
        foreach($args as $key=>$value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    public function attributes() {
        $attributes = array();
        foreach($database_columns as $column) {
            if($column === 'product_id') { continue; }
            $attributes[$column] = $this->$column;            
        }
        return $attributes;
    }

    public function sanitized_attributes() {
        $sanitized_attributes = array();
        foreach(self::$database_columns as $column) {
            if($column === 'product_id') { continue; }
            $sanitized_attributes[$column] = self::$connection->escape_string($this->$column);            
        }
        return $sanitized_attributes;
    }

    public static function find_by_sql($sql) {
        $result = self::$connection->query($sql);
        if(!$result) {
            die('Database query error.');
        }
        // convert results into object
        $object_array = [];

        while($record = $result->fetch_assoc()) {
            $object_array[] = self::instantiate($record);
        }

        $result->free();

        return $object_array;
    }

    public static function find_all() {
        $sql = "SELECT * FROM products";
        return self::find_by_sql($sql);
    }

    public static function find_by_id($id) {
        $sql = "SELECT * FROM products WHERE product_id = " . self::$connection->escape_string($id) . ";";
        $object_array = self::find_by_sql($sql);
        return array_shift($object_array);
    }

    public static function instantiate($record) {
        $object = new static;
        foreach($record as $property => $value) {
            if(property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }

}