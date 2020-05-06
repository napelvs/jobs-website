<?php
class DatabaseTable {
	private $pdo;
	private $table;
	private $primaryKey;

	public function __construct($pdo, $table, $primaryKey) {
		$this->pdo = $pdo;
		$this->table = $table;
		$this->primaryKey = $primaryKey;
    }

    // FIND FUNCTIONS
    function find() {
        $stmt = $this->$pdo->prepare('SELECT * FROM ' . $this->table);
        $stmt->execute();
        return $stmt->fetch();
    }

    function findAll() {
        $stmt = $this->$pdo->prepare('SELECT * FROM ' . $this->table);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function findAllOneFieldNoDuplicates($field) {
        $stmt = $this->$pdo->prepare('SELECT DISTINCT ' . $field . ' FROM ' . $this->$table);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function findAllOrder($orderby, $axis, $limit) {
        $stmt = $this->$pdo->prepare('SELECT * FROM ' . $this->$table . ' ORDER BY ' . $orderby . ' ' . $axis . ' LIMIT ' . $limit);
        $criteria = [
            'orderby' => $orderby,
            'axis' => $axis,
            'limit' => $limit
        ];
        $stmt->execute($criteria);
        return $stmt->fetchAll();
    }

    function findWithInnerJoin($table2, $foreignKey, $field, $value) {
        $stmt = $this->$pdo->prepare('	SELECT * 
                                FROM ' . $this->table . ' t1 
                                INNER JOIN ' . $table2 . ' t2 
                                ON t1.' . $foreignKey . ' = t2.' . $this->$primaryKey . '
                                WHERE t1.' . $field . ' = :value');

        $criteria = [
            'value' => $value
        ];
        $stmt->execute($criteria);

        return $stmt->fetch();
    }

    function findWithOneField($field, $value) {
        $stmt = $this->$pdo->prepare('SELECT * FROM ' . $this->$table . ' WHERE ' . $field . ' = :value');

        $criteria = [
            'value' => $value
        ];
        $stmt->execute($criteria);

        return $stmt->fetch();
    }

    function findWithOneFieldAll($field, $value) {
        $stmt = $this->$pdo->prepare('SELECT * FROM ' . $this->$table . ' WHERE ' . $field . ' = :value');

        $criteria = [
            'value' => $value
        ];
        $stmt->execute($criteria);

        return $stmt->fetchAll();
    }

    function findWithThreeFieldAll($field1, $value1, $field2, $value2, $field3, $value3) {
        $stmt = $this->$pdo->prepare('SELECT * FROM ' . $this->$table . ' WHERE ' . $field1 . ' = :value1 AND ' . $field2 . ' = :value2 AND ' . $field3 . ' = :value3');

        $criteria = [
            'value1' => $value1,
            'value2' => $value2,
            'value3' => $value3
        ];
        $stmt->execute($criteria);

        return $stmt->fetchAll();
    }

    function findWithThreeFieldCustom($field1, $operator1, $value1, $field2, $operator2, $value2, $field3, $operator3, $value3) {
        $stmt = $this->$pdo->prepare('	SELECT * FROM ' . $this->$table . ' WHERE ' . $field1 . ' ' . $operator1 . ' :value1 AND ' . $field2 . ' ' . $operator2 . ' :value2 AND ' . $field3 . ' ' . $operator3 . ' :value3');

        $criteria = [
            'value1' => $value1,
            'value2' => $value2,
            'value3' => $value3
        ];
        
        $stmt->execute($criteria);

        return $stmt->fetchAll();
    }

    function findWithTwoFieldAll($field1, $value1, $field2, $value2) {
        $stmt = $this->$pdo->prepare('SELECT * FROM ' . $this->$table . ' WHERE ' . $field1 . ' = :value1 AND ' . $field2 . ' = :value2');

        $criteria = [
            'value1' => $value1,
            'value2' => $value2
        ];
        $stmt->execute($criteria);

        return $stmt->fetchAll();
    }

    function findWithTwoFieldCustom($field1, $operator1, $value1, $field2, $operator2, $value2) {
        $stmt = $this->$pdo->prepare('SELECT * FROM ' . $this->$table . ' WHERE ' . $field1 . ' ' . $operator1 . ' :value1 AND ' . $field2 . ' ' . $operator2 . ' :value2');

        $criteria = [
            'value1' => $value1,
            'value2' => $value2
        ];
        $stmt->execute($criteria);

        return $stmt->fetchAll();
    }

    // UPDATE/INSERT/SAVE
    function update($record) {

        $query = 'UPDATE ' . $this->$table . ' SET ';

        $parameters = [];
        foreach ($record as $key => $value) {
            $parameters[] = $key . ' = :' .$key;
        }

        $query .= implode(', ', $parameters);
        $query .= ' WHERE ' . $this->$primaryKey . ' = :primaryKey';

        $record['primaryKey'] = $record[$this->$primaryKey];

        $stmt = $this->$pdo->prepare($query);

        $stmt->execute($record);
    }

    function insert($record) {
        $keys = array_keys($record);

        $values = implode(', ', $keys);
        $valuesWithColon = implode(', :', $keys);

        $query = 'INSERT INTO ' . $this->$table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';

        $stmt = $this->$pdo->prepare($query);

        $stmt->execute($record);
    }   

    function save($record) {
        try {	
            insert($record);
        }
        catch (Exception $e) {
            update($record);
        }
    }

    // DELETE FUNCTION
    function delete($field, $value) {
        $stmt = $this->$pdo->prepare('DELETE FROM ' . $this->$table . ' WHERE ' . $field . ' = :value');
        $criteria = [
            'value' => $value
        ];
        $stmt->execute($criteria);
    }
}