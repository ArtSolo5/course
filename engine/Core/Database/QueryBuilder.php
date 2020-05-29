<?php

namespace Engine\Core\Database;

class QueryBuilder
{
    /**
     * @var array
     */
    protected $sql = [];

    /**
     * @var array
     */
    public $values = [];

    /**
     * @param string $fields
     * @return $this
     */
    public function select(string $fields = "*")
    {
        $this->reset();
        $this->sql['select'] = "SELECT {$fields} ";

        return $this;
    }

    /**
     * @return $this
     */
    public function delete()
    {
        $this->reset();
        $this->sql['delete'] = "DELETE ";

        return $this;
    }

    /**
     * @param string $table
     * @return $this
     */
    public function from(string $table)
    {
        $this->sql['from'] = "FROM {$table} ";

        return $this;
    }

    /**
     * @param string $column
     * @param $value
     * @param string $operator
     * @return $this
     */
    public function where(string $column, $value, string $operator = '=')
    {
        $this->sql['where'][] = "{$column} {$operator} ?";
        $this->values[] = $value;

        return $this;
    }

    /**
     * @param int $field
     * @param string $order
     * @return $this
     */
    public function orderBy(int $field, string $order)
    {
        $this->sql['order_by'] = "ORDER BY {$field} {$order}";

        return $this;
    }

    /**
     * @param int $number
     * @return $this
     */
    public function limit(int $number)
    {
        $this->sql['limit'] = " LIMIT {$number}";

        return $this;
    }

    /**
     * @param string $table
     * @return $this
     */
    public function update(string $table)
    {
        $this->reset();
        $this->sql['update'] = "UPDATE {$table} ";

        return $this;
    }

    /**
     * @param string $table
     * @return $this
     */
    public function insert(string $table)
    {
        $this->reset();
        $this->sql['insert'] = "INSERT INTO {$table} ";

        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function set(array $data = [])
    {
        $this->sql['set'] .= "SET ";

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $this->sql['set'] .= "{$key} = ?";
                if (next($data)) {
                    $this->sql['set'] .= ", ";
                }
                $this->values[] = $value;
            }
        }

        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function values(array $data = [])
    {
        $this->sql['values'] = '(';

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $this->sql['values'] .= $key;
                if (next($data)) {
                    $this->sql['values'] .= ", ";
                }
            }
            $this->sql['values'] .= ') VALUES (';
            foreach ($data as $key => $value) {
                $this->sql['values'] .= '?';
                if (next($data)) {
                    $this->sql['values'] .= ", ";
                }
                $this->values[] = $value;
            }
            $this->sql['values']  .= ')';
        }

        return $this;
    }

    /**
     * @return string
     */
    public function sql()
    {
        $sql = '';

        if (!empty($this->sql)) {
            foreach($this->sql as $key => $value) {
                if ($key == 'where') {
                    $sql .= ' WHERE ';
                    foreach ($value as $where) {
                        $sql .= $where;
                        if (count($value) > 1 && next($value)) {
                            $sql .= ' AND ';
                        }
                    }
                } else {
                    $sql .= $value;
                }
            }
        }

        return $sql;
    }

    /**
     * Clear sql and values arrays
     */
    public function reset()
    {
        $this->sql = [];
        $this->values = [];
    }
}