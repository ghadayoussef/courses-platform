<?php
use App\User;
function add_supporters_to_sidebar(){
  $supporters = User::get()->where('role','Supporter');

    foreach($supporters as $supporter){
   echo(   '
    <li class="nav-item">
                    <a href="/supporters/'.$supporter["id"].'" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>'.$supporter["name"].'</p>
                    </a>
                  </li>' )
  ;

    }

}