<?php

class Database
{
    /**
     * This function calls a mysql procedure on the set server and database.
     * @param string $name Name of the procedure that should be called.
     * @param array $parameters Parameters that should be given with the procedure.
     * The length of the array should be the same as the needed parameters for the procedure.
     * If $returns is true, the length should be one element less.
     * @param bool $returns Default: true. Set if the called procedure has a return (OUT) parameter.
     * @return string|bool On success, returns either the string if $returns is true or true if not.
     * Returns false on failure.
     */
    public function callProcedure(string $name, array $parameters, bool $returns = true): bool|string
    {
        $connection = new mysqli(
            $_ENV['DB_HOST'],
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD'],
            $_ENV['DB_SCHEMA'],
            $_ENV['DB_PORT']
        );

        if ($connection->connect_error) {
            try {
                $connection->close();
            } catch (Exception) {
            }
            return false;
        }

        $parStr = '';

        foreach ($parameters as $parameter) {
            if (gettype($parameter) === "integer") {
                $parStr .= "$parameter, ";
            } else if (gettype($parameter) === 'boolean') {
                $parStr .= ($parameter ? 'true' : 'false') . ', ';
            } else if ($parameter === null) {
                $parStr .= "null, ";
            } else {
                $parStr .= "'$parameter', ";
            }
        }
        $parStr = rtrim(trim($parStr), ',');

        $resStr = $returns ? ($parStr == '' ? "@res)" : ", @res)") : ")";
        $queryString = "CALL " . $name . "(" . $parStr . $resStr;
        if (!$connection->query($queryString)) {
            try {
                $connection->close();
            } catch (Exception) {
            }
            return false;
        }

        if ($returns) {
            if (!($res = $connection->query("SELECT @res AS result"))) {
                try {
                    $connection->close();
                } catch (Exception) {
                }
                return false;
            }

            $row = $res->fetch_assoc();

            try {
                $connection->close();
            } catch (Exception) {
            }

            if (is_null($row['result'])) {
                return false;
            } else {
                return $row['result'];
            }
        } else {
            try {
                $connection->close();
            } catch (Exception) {
            }

            return true;
        }
    }
}
