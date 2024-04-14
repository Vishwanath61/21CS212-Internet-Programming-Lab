<?php
/*3.Develop a PHP class representing a ticket with properties like event name, venue, date, and price.
 Implement methods for booking and canceling tickets, as well as generating tickets for customers*/

class Ticket{
    public $name;
    public $venue;
    public $date;
    public $price;
    public $status;

    public function __construct($n,$v,$d,$p)
    {
        $this->name=$n;
        $this->venue=$v;
        $this->date=$d;
        $this->price=$p;
        $this->status=false;
    }

    public function eventName(){
        return $this->name;
    }

    public function eventVenue(){
        return $this->venue;
    }

    public function eventDate(){
        return $this->date;
    }
    
    public function eventPrice(){
        return $this->price;
    }

    public function generateTicket($username)
    {
        return "<div style='background-color: #f2f2f2; border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;'>
                    <h2 style='color: #333;'>Ticket Details</h2>
                    <p><strong>Name:</strong> Mr/Ms.{$username}</p>
                    <p><strong>Event Name:</strong> {$this->name}</p>
                    <p><strong>Venue:</strong> {$this->venue}</p>
                    <p><strong>Event Date:</strong> {$this->date}</p>
                    <p><strong>Price:</strong> {$this->price}</p>
                </div>";
    }


    public function booked($uname){
        $this->status=true;
        if($this->status)
        {
            echo "You have successfully booked ticket for the event {$this->name}<br><br>";
            return $this->generateTicket($uname);
        }
    }

    public function canceled(){
        if($this->status)
        {
            return "Your ticket for {$this->name} has been cancelled";
        }
        $this->status=false;
    }
}

$ticket=new Ticket("CSK vs MI","Chepauk","14-04-2024",3000);
echo $ticket->booked("Vishwanath");
?>