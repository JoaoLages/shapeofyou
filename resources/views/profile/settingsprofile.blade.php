@extends('layouts.master')

@section('title')
    <title>SHAPE OF YOU | Profile Settings</title>
@endsection

@section('content')
    <div class="h1_bg">
        <h1>SETTINGS</h1>
    </div>
    <div class="profile_section">
        <div class="profile_navigation">

            <div class="profile_navigation_sections profile_navigation__section_box">
                <a href="{{ url ('profile')}}">My Profile</a>
            </div>
            <div class="profile_navigation_sections profile_navigation__section_box">
                <a href="{{ url ('beforeafterprofile')}}">Before/After</a>
            </div>
            <div class="profile_navigation_sections profile_navigation__section_box">
                <a href="{{ url ('motivationprofile')}}">Motivation</a>
            </div>
            <div class="profile_navigation_sections profile_navigation__section_box">
                <a href="{{ url ('blogoverviewprofile')}}">My Blogs</a>
            </div>
            <div class="profile_navigation_sections profile_navigation__section_box">
                <a href="{{ url ('workoutprofile')}}">My Workout</a>
            </div>
            <div class="profile_navigation_sections profile_navigation__section_box">
                <a href="{{ url ('buddiesprofile')}}">My Buddies</a>
            </div>
            <div class="profile_navigation_sections profile_navigation__section_box">
                <a href="{{ url ('settingsprofile')}}">Settings</a>
            </div>
            <div class="profile_navigation_sections profile_navigation__section_box">
                <a href="{{ url('logout') }}">Logout</a>
            </div>
        </div>

        <div class="profile_info_section">
            <div class="profile_info_section_images">
                @if(Auth::user()->profilepic)
                        <div style="background-image:url({{'images/uploads/' . Auth::user()->profilepic}});background-size:cover; background-position:center;"
                             class="profile_picture">
                        </div>

                @else
                    <img alt="default profilepic" src="{{('images/profile/default_profile_pic_v1.png')}}" class="profile_picture">
                @endif

                    <div class="profile_personal_section">
                        <p>Body Shape</p>
                        @if((Auth::user()->UserShape === 0) || (Auth::user()->UserShape === NULL))
                            <img alt="shape" src="{{('images/profile/default_secret.png')}}">
                        @elseif(Auth::user()->UserShape === 1)
                            <img alt="shape" src="{{('images/pear_shape_1.png')}}">
                        @elseif(Auth::user()->UserShape === 2)
                            <img alt="shape" src="{{('images/apple_shape_1.png')}}">
                        @elseif (Auth::user()->UserShape === 3)
                            <img alt="shape" src="{{('images/hourglass_shape_1.png')}}">
                        @elseif (Auth::user()->UserShape === 4)
                            <img alt="shape" src="{{('images/stick_shape_1.png')}}">
                        @endif
                    </div>

                <div class="profile_personal_section">
                    <p>Diet</p>
                    @if((Auth::user()->UserDiet === 0) || (Auth::user()->UserDiet === NULL))
                        <img alt="diet" src="{{('images/profile/default_secret.png')}}">
                    @elseif(Auth::user()->UserDiet === 1)
                        <img alt="diet" src="{{('images/community/nospecialdiet.png')}}">
                    @elseif(Auth::user()->UserDiet === 2)
                        <img alt="diet" src="{{('images/community/pescetarian.png')}}">
                    @elseif (Auth::user()->UserDiet === 3)
                        <img alt="diet" src="{{('images/community/vegan.png')}}">
                    @elseif (Auth::user()->UserDiet === 4)
                        <img alt="diet" src="{{('images/community/vegetarian.png')}}">
                    @endif
                </div>

                <div class="profile_personal_section">
                    <p>Goal</p>
                    @if((Auth::user()->UserGoal === 0) || (Auth::user()->UserGoal === NULL))
                        <img alt="goal" src="{{('images/profile/default_secret.png')}}">
                    @elseif(Auth::user()->UserGoal === 1)
                        <img alt="goal" src="{{('images/lose_weight_3.png')}}">
                    @elseif(Auth::user()->UserGoal === 2)
                        <img alt="goal" src="{{('images/become_fit_2.png')}}">
                    @elseif (Auth::user()->UserGoal === 3)
                        <img alt="goal" src="{{('images/build_muscles_2.png')}}">
                    @elseif (Auth::user()->UserGoal === 4)
                        <img alt="goal" src="{{('images/healthy_lifestyle_2.png')}}">
                    @endif
                </div>

            </div>

            <div class="profile_section_personal">
                <div>
                    <p>MOTIVATION QUOTE</p>
                    <p class="profile_section_personal_motivation_quote">@if(Auth::user()->mq){{ Auth::user()->mq }} @else
                            'No motivational quote defined...' @endif</p>
                </div>

                <div class="profile_info_section_personal_details">
                    <div>
                        <p>NAME:</p>
                        <p>AGE:</p>
                        <p>COUNTRY:</p>
                    </div>
                    <div>
                        <p> {{ Auth::user()->username }} </p>
                        <p> @if(Auth::user()->birthdate){{ Auth::user()->birthdate }} @else no birth date
                            defined @endif </p>
                        <p> @if(Auth::user()->origin){{ Auth::user()->origin }} @else no origin defined @endif</p>
                    </div>
                </div>
            </div>

        </div>


    </div>


    <div class="title_bg">
        <h2>Edit Profile Settings</h2>
    </div>

    <div class="profile_setting_section">

        <div>
            <form class="edit_profile_form" method="post" action="/edit">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label>First Name</label>
                <input type="text" name="firstname" placeholder="First Name">
                <label>Last Name</label>
                <input type="text" name="lastname" placeholder="Last Name">

                <button class="white_button">Change Name</button>
            </form>
            <form class="edit_profile_form" method="post" action="/edit">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label>Password</label>
                <input type="password" name="password" placeholder="Your password">
                <label>Repeat Password</label>
                <input type="password" name="password_confirmation" placeholder="Repeat password"
                       id="password_confirmation">
                <button class="white_button">Change Password</button>
            </form>
        </div>

        <div>
            <form class="edit_profile_form" method="post" action="/edit">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email">
                <button class="white_button">Update Email</button>
            </form>
            <form class="edit_profile_form" method="post" action="/edit">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username">
                <button class="white_button">Change Username</button>
            </form>

        </div>
        <div>
            <form class="edit_profile_form" method="post" action="/upload_photo" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label>Change Profile Picture</label><br>
                <input type="file" name="ProfileToUpload" id="ProfileToUpload">
                <button class="white_button">Change Profile Picture</button>
            </form>
            <form class="edit_profile_form" method="post" action="/edit">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label>Motivational Quote</label>
                <input type="text" name="mq" placeholder="Your motivational Quote...">
                <button class="white_button">Update</button>
            </form>
        </div>
        <div>
            <form class="edit_profile_form" method="post" action="/edit">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label>Birthdate</label><br>
                <input type="date" name="birthdate">
                <button class="white_button">Change</button>
            </form>
            <form class="edit_profile_form" method="post" action="/edit">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label>Origin</label><br>
                <input type="Text" name="origin" placeholder="Origin">
                <button class="white_button">Update</button>
            </form>

        </div>

        <div>
            <form class="edit_profile_form" method="post" action="/edit">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label>Body Shape</label><br>
                <select type="text" name="UserShape">
                    <option value="0">Secret</option>
                    <option value="1">Pear</option>
                    <option value="2">Apple</option>
                    <option value="3">Hour Glass</option>
                    <option value="4">Straight</option>
                </select>

                <button class="white_button">Change</button>
            </form>

            <form class="edit_profile_form" method="post" action="/edit">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label>Change Diet</label><br>
                <select type="text" name="UserDiet">
                    <option value="0">Secret</option>
                    <option value="1">No diet</option>
                    <option value="2">Pescetarian</option>
                    <option value="3">Vegan</option>
                    <option value="4">Vegetarian</option>
                </select>
                <button class="white_button">Change</button>
            </form>

            <form class="edit_profile_form" method="post" action="/edit">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label>Change Goal</label><br>
                <select type="text" name="UserGoal">
                    <option value="0">Secret</option>
                    <option value="1">Lose weight</option>
                    <option value="2">Stay/Become fit</option>
                    <option value="3">Build muscles</option>
                    <option value="4">Stay/Become healthy</option>
                </select>

                <button class="white_button">Change</button>
            </form>
        </div>
        <div>
            <form class="edit_profile_form" method="post" action="/edit">
                <label>Delete My Account</label><br>

                <button class="login_button delete_account">DELETE ACCOUNT</button>
            </form>
        </div>
    </div>



@endsection
