<?php
use App\User;
function add_supporters_to_sidebar(){
  $supporters = User::get()->where('role','Supporter');
if(auth()->user()->isNotBanned()){
    foreach($supporters as $supporter){
   echo(   '
    <li class="nav-item">
                    <a href="/supporters/'.$supporter["id"].'" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>'.$supporter["name"].'</p>
                    </a>
                  </li>' )
  ;

    }}
    

}
function coursesComments($comments){
  $userComment=false;
  $courses=auth()->user()->courses;
  $currentComment=0;
  foreach($comments as $index=>$comment)
  { 
    foreach($courses as $index=>$course)
    {
     if($comment->course_id==$course->id)
     $userComment=true;
    

    }
    if($userComment==false)
    unset($comments[$currentComment]);
    else
    $userComment==false;
    $currentComment++;
  }
  return $comments;
}
