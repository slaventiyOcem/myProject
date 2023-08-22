<?php

namespace app\models;

class BookingModel extends AbstractModel
{
     /**
     * @return array|null
     * retrieves all reservations from a table
     */
    public function find($date) : ?array
    {
        $query = "SELECT (date) FROM reservations where (date) like '$date' '%'";
        $result = $this->db->query($query);
        $this->checkResult($result);

        return $result->fetch_all();
    }

    /**
     * @return void
     * adds a booking record to the database
     */

    public function add($time,$date,$userId)
    {
        $reserve = $date .' '. $time . ':00:00';
        $timeStamp = strtotime($reserve);
        $date = date('Y-m-d H:i:s', $timeStamp);
        $query = "INSERT INTO reservations (user_id, date) VALUES ('$userId','$date')";
        $result = $this->db->query($query);
        $this->checkResult($result);
    }
}