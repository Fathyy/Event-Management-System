<?php
require_once 'Booking.php';
require_once '../library/config.php';
require_once '../library/functions.php';

$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : '';

switch ($cmd) {
    case 'book':
        bookCalender();
        break;

    case 'holiday':
        addHoliday();
        break;
    
    case 'hdelete':
        deleteHoliday();
        break;
        
    case 'calview':
        calendarView();
        break;

    case 'regConfirm':
        regConfirm();
        break;
            
    case 'delete':
        regDelete();
        break;
    
    case 'user':
        userDetails();
        break;
    
    default:
        break;
}

// create a holiday
function addHoliday(){
    $date = $_POST['date'];
    $reason = $_POST['reason'];

    $errorMessage = '';
    // check if holiday exists
    $sql = "SELECT * FROM holidays WHERE date = '$date'";
    $result = db_query($sql);
    if(num_rows($result) > 0){
        $errorMessage = "Holiday already exits in records";
        header("Location: ../views/?v=HOLY&err=" . urlencode($errorMessage));
        exit();
    }
    else{
        $sql = "INSERT INTO holidays(date, reason, bdate)
        VALUES('$date', '$reason', NOW())";
        $result = db_query($sql);
        $msg = 'Holdiay successfully added on the calendar';
        header('Location: ../views/?v=HOLY&msg=' . urlencode($msg));
        exit();	        
    }
}

// book an event
function bookCalender(){
    $name = $_POST['name'];
    $userId = (int)$_POST['userId'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $rdate = $_POST['rdate'];
    $rtime = $_POST['rtime'];
    $bkdate = $rdate. ''. $rtime;
    $ucount = $_POST['pCount'];

    // check if the date has a holiday and if so, you can't book it
    $hsql = "SELECT * holidays WHERE date = '$rdate'";
    $hresult = db_query($hsql);
    if(num_rows($hresult) > 0){
        $errorMessage = "You cannot book an event on a holiday";
        header('Location: ../views/?=DB&err=' . urlencode($errorMessage));
        exit();
    }

    // otherwise allow the user to reserve that date
    $sql = "INSERT INTO reservations (uid, ucount, status, comments, bdate)
    VALUES('$userId', '$ucount', '$bkdate', 'PENDING', NOW())";
    db_query($sql);

    // send email to the user to take further action through their email
    $bodyMsg = "User $name booked the date slot on $bkdate Requesting you to please take further action on user booking.<br/>Mbr/>Fathi Abdi";
    $data = array(
        'to'=> 'fathiabdi254@gmail.com',
        'sub' => "Booking on $rdate.",
        'msg' => $bodymsg
    );
    header('Location: ../index.php?msg=' . urlencode('User successfully registered.'));
	exit();
}

function deleteHoliday(){
    $holyId = $_GET['hId'];
    $sql = "DELETE FROM holidays WHERE id = '$holyId'";
    db_query($sql);
    header('Location: ../views/?v=HOLY&msg=' . urlencode('Holiday record successfully deleted.'));
    exit();
}

function calendarView(){
    $start = $_POST['start'];
    $end = $_POST['end'];

    $bookings = array();

    $sql = "SELECT u.name AS u_name, u.id AS user_id, r.rdate, r.status
    FROM users u, reservations r WHERE u.id = r.uid
    AND (r.rdate BETWEEN '$start' AND '$end')";
    $reseult = db_query($sql);
    while ($row = fetch_assoc($result)) {
        $book_name = $row['name'];
        $book_rdate = $row['rdate'];

        $book = new Booking();
        $book->title  = $book_name;
        $book->start  = $book_rdate;
        $bgClr = '#f39c12';//pending
        if($status == 'DENIED') {$bgClr = '#ff0000';}
        else if($status == 'APPROVED') {$bgClr = '#00cc00';}
        $book->backgroundColor = $bgClr;
        $book->url = WEB_ROOT . 'views/?v=USER&ID=' . $user_id;
        $bookings[]  = $book;
    }

    // sql to get the booked days to be displayed on the calender
    $ssql = "SELECT * FROM holidays WHERE 
    (date BETWEEN '$start' AND '$end')";
    $sresult = db_query($ssql);
    while ($row = fetch_assoc($sresult)) {
        $b = new Booking();
        // assign row items variables
        $id = $row['id'];
        $date = $row['date'];
        $reason = $row['reason'];

        $b->block = true;
        $b->title = $reason;
        $b->start = $date;
        $b->allDay = true;
        $b->borderColor = '#F0F0F0';
		$b->className = 'fc-disabled';
        $bookings[] = $b;
    }

    json_encode($bookings);

}
?>