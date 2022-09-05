<?php 

namespace data;

require_once '..\config\dbinfo.php';
use \PDO;

use \config\DBInfo;


class ConferenceData extends DBInfo
{
    protected $id;
    protected $title;
    protected $meetingdate;
    protected $address;
    protected $country;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDate()
    {
        return $this->meetingdate;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function setDate($meetingdate)
    {
        return $this->meetingdate = $meetingdate;
    }

    public function setAddress($address)
    {
        return $this->address = $address;
    }

    public function setCountry($country)
    {
        return $this->country = $country;
    }

    public function create()
    {
        $title = $this->getTitle();
        $meetingdate = $this->getDate();
        $address = $this->getAddress();
        $country = $this->getCountry();

        $conn = $this->getConn(); // эта функцию из класса который наследую, просто для подключения к бд;
        $sql = "INSERT INTO Conferences (Title, MeetingDate, Address, Country) VALUES ('$title', '$meetingdate', '$address', '$country')";
        $conn->exec($sql);
    }

    public function read()
    {
        $conn = $this->getConn();
                        
        $sql = "SELECT * FROM conferences"; 
       
        $result = $conn->query($sql)->fetchall(PDO::FETCH_ASSOC);
        return json_encode($result);
    }

    public function details($id){
        $conn = $this->getConn();
        $sql = "SELECT * FROM conferences WHERE Id = $id";
        
        $result = $conn->query($sql)->fetchall(PDO::FETCH_ASSOC);
        return json_encode($result);
    }

    public function update(int $id)
    {
        $title = $this->getTitle();
        $meetingdate = $this->getDate();
        $address = $this->getAddress();
        $country = $this->getCountry();

        $conn = $this->getConn();
        $sql = "UPDATE Conferences 
        SET Title = '$title', MeetingDate = '$meetingdate', Address = '$address', Country = '$country'
        WHERE Id = $id
        ";
        $conn->exec($sql);
    }

    public function delete(int $id)
    {
        $conn = $this->getConn();
        $sql = "DELETE FROM conferences WHERE id=$id";
        $conn->exec($sql);
    }
}

?>