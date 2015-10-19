<html>
    <head>
        <title>
        Kidlr Poster
        </title>
    </head>
    <body>
        <?php //header("auth-token: {sPjZze9s@4hyBAieLdWJFz2juAdgnnRhsTVC>Wih))J9WT(kr"); ?>
    </body>
</html>

<?php

$accessToken = '144489055661701A49-F252-437B-BC11-5A4CEA871814';
//$accessToken = '1444734374415E6013-E2E6-4688-A039-974F58DA5CDE'; // live


// register a new user
$endPoint1 = 'api/user/register';
$registerUser =  array(
    'username' => 'Aleem111',
    'email' => 'ahsanalikhan23@putitout.co.uk',
    'password' => '125545',
    'registration_origin' => 'standard',
    'first_name' => 'New',
    'middle_name' => 'Khan',
    'last_name' => 'User',
   // 'status' => '1',
   // 'type' => '1',
    'gender' => 'male'
);


// verify user's email
$endPoint2 = 'api/user/varify-email';
$verifyEmail =  array(
    'email' => 'ahsan.ali.khan@gmail.com',
);


// user logout
$endPoint3 = 'api/user/logout';
$userLogout =  array(
    'access_token' => '1438777160EF536453-8BBB-4A42-8F1D-C668D6B9EBF1',
);


// user login
$endPoint4 = 'api/user/login';
$userLogin =  array(
    'email' => 'ali@gmail.com',
    'password' => '125545'
);

// user already login
$endPoint5 = 'api/user/is-logged-in';
$userIsLoggedIn =  array(
    'email' => 'ali@gmail.com'
);


// update user information
$endPoint6 = 'api/user/update';
$updateUser =  array(
    'access_token' => $accessToken,
    'first_name' => 'Test11',
  //  'middle_name' => 'Khan',
    'last_name' => 'User11',
 //   'status' => '1',
 //   'type' => '1',
    'gender' => 'male'
);


// upload file
$endPoint7 = 'api/image/upload';
$uploadFiles =  array(
    'access_token' => $accessToken,
    'related_to' => 'users',
    'related_id' => '6',
    'category' => 'main_image',
    'ext'        => 'jpg',
);
$file = array('path'=> 'D:\wamp\www\testers\images\Desert.jpg', 'type'=>'image/jpeg','name'=>'file1');

// display image file
$endPoint8 = 'api/image/show?';
$showImageFile =  array(
    'access_token' => $accessToken,
    'rt' => 'users',
    'ri' => '6',
    'ca' => 'main_image',
    //'size' => 'large'
);
$getImageQuery = http_build_query($showImageFile);



// send user invite
$endPoint9 = 'api/user/invite';
$inviteUser =  array(
    'access_token' => $accessToken,
    'invitees' => json_encode(array(
            array('rashid.akram@putitout.co.uk' , '0','John bhai'),
            array('ahsanalikhan1@putitout.co.uk' , '1','Jane behan'),
            array('ahsanalikhan2@putitout.co.uk' , '0', 'Bhai behan'), 
          
        )),
);


// create Album
$endPoint10 = 'api/album/create';
$createAlbum =  array(
    'name' => 'My Favorite Album',
    'access_token' => $accessToken,
    'visibility' => '5',
    'children_ids' => '1'
);

// get all Albums
$endPoint11 = 'api/album/list';
$getAlbums =  array(
    'access_token' => $accessToken,
);



// upload files on album
$endPoint12 = 'api/album/images/upload';
$uploadAlbumFiles =  array(
    'access_token' => $accessToken,
    'related_to' => 'users',
    'related_id' => '6',
    'category' => 'main_image',
    'ext'        => 'jpg',
);
$albumFile = array('path'=> 'D:\wamp\www\testers\images\Desert.jpg', 'type'=>'image/jpeg','name'=>'file1');


// Add a Baby
$endPoint13 = 'api/user/baby/add';
$addABaby =  array(
    'access_token' => $accessToken,
    'first_name' => 'Farooq',
    'middle_name' => 'Muhammad',
    'last_name' => 'Khan',
    'gender' => 'male',
    'weight' => '9',
    'height' => '30',
    'birthday' => '2015-01-01'
);

// update Album
$endPoint14 = 'api/album/update';
$updateAlbum =  array(
    'album_id' => '8',
    //'name' => 'My Fourth updated Album',
    //'description' => 'Trip to home',
    'access_token' => $accessToken,
    'visibility' => '5',
    'children_ids' => '1,3',
   // 'shared_with' => '5',
);

// Update a Baby
$endPoint15 = 'api/user/baby/update';
$updateABaby =  array(
    'access_token' => $accessToken,
    'first_name' => 'Faraz',
    'middle_name' => 'Muhammad',
    'last_name' => 'Khan',
    'gender' => 'male',
    'weight' => '9',
    'height' => '30',
    'birthday' => '2015-01-01',
    'baby_id'   => '2'
);


// Add a Question
$endPoint16 = 'api/question/create';
$createQuestion =  array(
    'title' => 'Why is my baby thin?',
    'description' => 'He is very thin, any help?',
    'access_token' => $accessToken,
    'visibility' => '5',
    'tag_ids' => '4'
);

// Add a Tag
$endPoint17 = 'api/question/tags/create';
$createTag =  array(
    'tag' => 'Awareness',
    'access_token' => $accessToken,
    
    //'children_ids' => '1,2'
);

// Search a Tag
$endPoint18 = 'api/question/tags/search';
$searchTag =  array(
    'tag_string' => 'a',
    'access_token' => $accessToken,
    
    //'children_ids' => '1,2'
);


// get all Questions
$endPoint19 = 'api/question/list';
$getQuestions =  array(
    'access_token' => $accessToken,
);

// get all Children
$endPoint20 = 'api/user/baby/list';
$getChildren =  array(
    'access_token' => $accessToken,
   // 'show_only_ids' => 'y',
);


// create Answer
$endPoint21 = 'api/question/answers/create';
$createAnswer =  array(
    'access_token' => $accessToken,
    'answer' => 'You should consult a doctor',
    'question_id' => 4
);

// Get Answers list
$endPoint22 = 'api/question/answers/list';
$getAnswers =  array(
    'access_token' => $accessToken,
    'question_id' => 2
);


// Create Medical Report
$endPoint23 = '/api/medical/create';
$createMedical =  array(
    'access_token' => $accessToken,
    'child_id' => 1,
    'name'  => 'Late Vaccination',
    'description' => 'This vaccination is about my baby'
);


// Update Medical Report
$endPoint24 = '/api/medical/update';
$updateMedical =  array(
    'access_token' => $accessToken,
    'child_id' => 2,
    'name'  => ' Vaccination',
    'description' => 'This report is about my Faraz vaccination',
    'appointment_datetime' => '2015-12-05 12:12:12',
    'medical_id' => 1
);


// List Medical Reports
$endPoint25 = '/api/medical/list';
$listMedical =  array(
    'access_token' => $accessToken,
    'child_id' => 2,
);


// Create Event
$endPoint26 = '/api/event/create';
$createEvent =  array(
    'access_token' => $accessToken,
    'invitee_ids' => '9',
    'name'  => 'Farhan Birthday',
    'location'  => 'my house, Lahore',
    'description' => 'I am expecting a great Birthday Party',
    'event_datetime' => '2015-11-06 12:12:12',
    
);
// Update Event
$endPoint27 = '/api/event/update';
$updateEvent =  array(
    'access_token' => $accessToken,
    'event_id' => '3',
    'name'  => 'Hassan Birthday Updated',
    'location'  => 'my location, Lahore',
    'description' => 'I am expecting a great Birthday Party',
    'event_datetime' => '2015-12-07 12:12:12',
    
);

// List Events
$endPoint28 = '/api/event/list';
$listEvents =  array(
    'access_token' => $accessToken,
);


// Update event invite
$endPoint29 = '/api/event/invite/update';
$updateEventInvite =  array(
    'access_token' => $accessToken,
    'status'    => 1,
    'event_id'  => 3
);

// Delete event
$endPoint30 = '/api/event/delete';
$deleteEvent =  array(
    'access_token' => $accessToken,
    'event_id'  => 2
);

// Get User Sent connections
$endPoint31 = '/api/user/friends/sent';
$getUserConnections =  array(
    'access_token' => $accessToken,
);

$endPoint32 = '/api/medical/delete';
$deleteMedical =  array(
    'access_token' => $accessToken,
    'medical_id' => 2,
);

$endPoint33 = '/api/post/create';
$createPost =  array(
    'access_token' => $accessToken,
   // 'child_id' => 2,
    'description'  => 'Faraz is looking good today'
);

$endPoint34 = '/api/post/update';
$updatePost =  array(
    'access_token' => $accessToken,
    'description'  => 'Ahmad is looking good today',
    'post_id' => 2
);

$endPoint35 = '/api/post/list';
$listPosts =  array(
    'access_token' => $accessToken,
    //'child_id' => 2
);

$endPoint36 = '/api/post/delete';
$deletePost =  array(
    'access_token' => $accessToken,
    'post_id' => 4
);

$endPoint37 = '/api/user/getid';
$getUserId =  array(
    'access_token' => $accessToken,
);

$endPoint38 = '/api/user/friends/request/send';
$sendFriendRequest =  array(
    'access_token' => $accessToken,
    'friend_id' => '37',
);

$endPoint39 = '/api/user/friends/request/update';
$updateFriendRequest =  array(
    'access_token' => $accessToken,
    'request_id' => '1',
    'status'    => '2',
);



$endPoint40 = '/api/user/connections/delete';
$deleteFriendRequest =  array(
    'access_token' => $accessToken,
    'request_id' => '1',
);
$endPoint41 = '/api/user/friends/search';
$searchFriends =  array(
    'access_token' => $accessToken,
    'name_string' => 'a',
    'limit' => 5,
    'offset' => 3,
);

$endPoint42 = '/api/user/friends/suggested';
$suggestedFriends =  array(
    'access_token' => $accessToken,
   // 'limit' => 2
);

$endPoint43 = '/api/user/friends/requests';
$FriendRequests =  array(
    'access_token' => $accessToken,
    'limit' => 1
);

$endPoint44 = '/api/user/friends/all';
$allFriends =  array(
    'access_token' => $accessToken,
    'limit' => 3
);

$endPoint45 = '/api/user/forget-password';
$forgetPassword =  array(
    'email' => 'rashid.akram@putitout.co.uk',
);

$endPoint46 = '/api/user/reset-password';
$resetPassword =  array(
    'access_token' => '1438673378567F64AD-E79E-4276-92F2-461C73C0D4CD',
    'current_password' => '7ed0d20b363235861f07afc952fffb1c8f73c64d93448a2497d0d77c1d6e43c2',
    'new_password' => '12345',
);

$endPoint47 = '/api/user/friends/relation/update';
$updateFriendRelation =  array(
    'access_token' => $accessToken,
    'request_id' => '218',
    'relation'    => '1',
);

$endPoint48 = '/api/user/social-login';
$socialLoginGoogle =  array(
   // 'access_token' => $accessToken,
    'social_id' => '111873514373696613185',
    'registration_origin'    => 'google',
);

$endPoint49 = '/api/user/profile';
$userProfile =  array(
   // 'access_token' => $accessToken,
    'access_token' => $accessToken,
    'user_id'    => '6',
);


// upload album media
$endPoint50 = '/api/album/media/upload';
$uploadAlbumMedia =  array(
    'access_token' => $accessToken,
    'album_id' => '4',
    'ext'        => 'mp4',
);

// show media list for a album
$endPoint51 = '/api/album/media/list';
$showAlbumMediaList =  array(
    'access_token' => $accessToken,
    'album_id' => '4',
);

// display album image file
$endPoint52 = '/api/album/media/show?';
$showAlbumImageFile =  array(
    'access_token' => $accessToken,
    'album_id' => '4',
    'media_system_name' => '1441629185_McWdDiHeU.png',
    'size' => 'medium'
);
$getAlbumImageQuery = http_build_query($showAlbumImageFile);


// Get User Object
$endPoint53 = '/api/user/getuser';
$getUserObject =  array(
    'access_token' => $accessToken,
);

// Delete a Baby
$endPoint54 = '/api/user/baby/delete';
$deleteABaby =  array(
    'access_token' => $accessToken,
    'child_id' => '3',
);

// Get Friends children
$endPoint55 = '/api/user/friends/children';
$getFriendsChildren =  array(
    'access_token' => $accessToken,
   // 'limit' => 1,
    'name_string' => 'khan'
);

// List Images
$endPoint56 = '/api/image/list';
$listImages =  array(
    'access_token' => $accessToken,
    'rt' => 'users',
    'ri' => '6',
    'ca' => 'main_image'
);

// CALLS
//sendRequest($endPoint1, $registerUser);
//sendRequest($endPoint2, $verifyEmail);
//sendRequest($endPoint3, $userLogout, 'PUT');
//sendRequest($endPoint4, $userLogin);
//sendRequest($endPoint5, $userIsLoggedIn, 'PUT');
//sendRequest($endPoint6, $updateUser, 'PUT');
//$showImageUploadForm = true; //sendRequest($endPoint7, $uploadFiles,'POST',$file);
// echo '<img src="http://kidlr-web.localhost/'.$endPoint8.$getImageQuery.' " />';
//sendRequest($endPoint9, $inviteUser, 'PUT');
//sendRequest($endPoint10, $createAlbum);
//sendRequest($endPoint11, $getAlbums, 'PUT');
//sendRequest($endPoint12, $uploadAlbumFiles,FALSE,$albumFile);
//sendRequest($endPoint13, $addABaby);
//sendRequest($endPoint14, $updateAlbum, 'PUT');
//sendRequest($endPoint15, $updateABaby, 'PUT');
//sendRequest($endPoint16, $createQuestion);
//sendRequest($endPoint17, $createTag);
//sendRequest($endPoint18, $searchTag, 'PUT');
//sendRequest($endPoint19, $getQuestions, 'PUT');
//sendRequest($endPoint20, $getChildren, 'PUT');
//sendRequest($endPoint21, $createAnswer);
//sendRequest($endPoint22, $getAnswers, 'PUT');
//sendRequest($endPoint23, $createMedical);
//sendRequest($endPoint24, $updateMedical, 'PUT');
//sendRequest($endPoint25, $listMedical, 'PUT');
//sendRequest($endPoint26, $createEvent);
//sendRequest($endPoint27, $updateEvent, 'PUT');
//sendRequest($endPoint28, $listEvents, 'PUT');
//sendRequest($endPoint29, $updateEventInvite, 'PUT');
//sendRequest($endPoint30, $deleteEvent, 'DELETE');
//sendRequest($endPoint31, $getUserConnections, 'PUT');
//sendRequest($endPoint32, $deleteMedical, 'DELETE');
//sendRequest($endPoint33, $createPost);
//sendRequest($endPoint34, $updatePost, 'PUT');
//sendRequest($endPoint35, $listPosts, 'PUT');
//sendRequest($endPoint36, $deletePost, 'DELETE');
//sendRequest($endPoint37, $getUserId, 'PUT');
//sendRequest($endPoint38, $sendFriendRequest);
//sendRequest($endPoint39, $updateFriendRequest, 'PUT');
//sendRequest($endPoint40, $deleteFriendRequest, 'DELETE');
//sendRequest($endPoint41, $searchFriends);
//sendRequest($endPoint42, $suggestedFriends);
//sendRequest($endPoint43, $FriendRequests);
//sendRequest($endPoint44, $allFriends);
//sendRequest($endPoint45, $forgetPassword);
//sendRequest($endPoint46, $resetPassword,'PUT');
//sendRequest($endPoint47, $updateFriendRelation,'PUT');
//sendRequest($endPoint48, $socialLoginGoogle);
//sendRequest($endPoint49, $userProfile,'PUT');
//$showAlbumMediaUploadForm = true;
//sendRequest($endPoint51, $showAlbumMediaList,'PUT');
// echo '<img src="http://kidlr-web.localhost/'.$endPoint52.$getAlbumImageQuery.' " />';
//sendRequest($endPoint53, $getUserObject,'PUT');
//sendRequest($endPoint54, $deleteABaby,'DELETE');
//sendRequest($endPoint55, $getFriendsChildren,'PUT');
//sendRequest($endPoint56, $listImages, 'PUT');


function sendRequest($endPoint, $data , $method = 'POST' , $file = array()){
        $host = 'http://kidlr-web.localhost/';
        //$host = 'http://kidlr.lotiv.com/';
       
        $url = $host.$endPoint;
       // echo $url;
        
        $ch = curl_init();                    // initiate curl
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
        curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
        //if($putRequest){
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        //}
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // define what you want to post
        
        if(count($file) == 3){ 
        //    curl_setopt($ch, CURLOPT_HTTPHEADER, array('auth-token: {sPjZze9s@4hyBAieLdWJFz2juAdgnnRhsTVC>Wih))J9WT(kr', 'Content-Type: multipart/form-data')); // headers
        //    $data['image_file'] = new CURLFile($file['path'],$file['type'],$file['name']);
        }else{
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'auth-token: {sPjZze9s@4hyBAieLdWJFz2juAdgnnRhsTVC>Wih))J9WT(kr'
            ));
        }
        //curl_setopt($ch, CURLOPT_HEADER, true);
        $output = curl_exec($ch); // execute
        if($errno = curl_errno($ch)) {
            $error_message = curl_strerror($errno);
            echo "cURL error ({$errno}):\n {$error_message}";
        }
        curl_close($ch); // close curl handle
        //var_dump($output);
        echo $output;
       
}

if(isset($showAlbumMediaUploadForm) && $showAlbumMediaUploadForm === TRUE){
    $host = 'http://kidlr-web.localhost/';
    ?>
<form action="<?php echo $host.$endPoint50; ?>" method="POST" enctype="multipart/form-data">
    Album Id: <input type="text" name="album_id" value="4" />
    ext: <input type="text" name="ext" value="mp4" />
    access_token: <input type="text" name="access_token" value="<?php echo $accessToken; ?>" />
    <input type="file" name="media_file" />
    <input type="submit" />
</form>

<?php

}

if(isset($showImageUploadForm) && $showImageUploadForm === TRUE){
    $host = 'http://kidlr-web.localhost/';
    ?>
<form action="<?php echo $host.$endPoint7; ?>" method="POST" enctype="multipart/form-data">
    related to: <input type="text" name="related_to" value="users" />
    related id: <input type="text" name="related_id" value="6" />
    category: <input type="text" name="category" value="main_image" />
    ext: <input type="text" name="ext" value="jpg" />
    access_token: <input type="text" name="access_token" value="<?php echo $accessToken; ?>" />
    <input type="file" name="media_file" />
    <input type="submit" />
</form>

<?php    
}



