<style>
    *,  *:before,  *:after  {
        -moz-box-sizing:  border-box;
        -webkit-box-sizing:  border-box;
        box-sizing:  border-box;
    }
    @keyframes animatedBackground  {
        from  {
            background-position:  0 0;
        }
        to  {
            background-position:  100% 0;
        }
    }
    form  {
        max-width:  300px;
        margin:  10px auto;
        padding:  10px 20px;
        background:  #f4f7f8;
        border-radius:  8px;
    }

    a{
        color:#fff;
        font-weight:400;
        text-decoration:none;
        font-size:26px;
    }

    h1  {
        margin:  0 0 30px 0;
        text-align:  center;
    }
    input[type="text"],  input[type="password"],  input[type="date"],  input[type="datetime"],  input[type="email"],  input[type="number"],  input[type="search"],  input[type="tel"],  input[type="time"],  input[type="url"],  textarea,  select  {
        background:  rgba(255, 255, 255, 0.1);
        border:  none;
        font-size:  16px;
        height:  auto;
        outline:  0;
        padding:  15px;
        width:  100%;
        background-color:  #e8eeef;
        color:  #8a97a0;
        box-shadow:  0 1px 0 rgba(0, 0, 0, 0.03) inset;
    }
    input[type="radio"],  input[type="checkbox"]  {
        margin:  0 4px 8px 0;
    }
    select  {
        padding:  6px;
        height:  32px;
        border-radius:  2px;
    }
    button  {
        padding:  19px 39px 18px 39px;
        color:  #FFF;
        background-color:  #4bc970;
        font-size:  18px;
        text-align:  center;
        font-style:  normal;
        border-radius:  5px;
        width:  100%;
        border:  1px solid #3ac162;
        border-width:  1px 1px 3px;
        box-shadow:  0 -1px 0 rgba(255, 255, 255, 0.1) inset;
        margin-bottom:  10px;
    }
    fieldset  {
        margin-bottom:  30px;
        border:  none;
    }
    legend  {
        font-size:  1.4em;
        margin-bottom:  10px;
    }
    label  {
        display:  block;
        margin-bottom:  8px;
    }
    label.light  {
        font-weight:  300;
        display:  inline;
    }
    .number  {
        background-color:  #5fcf80;
        color:  #fff;
        height:  30px;
        width:  30px;
        display:  inline-block;
        font-size:  0.8em;
        margin-right:  4px;
        line-height:  30px;
        text-align:  center;
        text-shadow:  0 1px 0 rgba(255, 255, 255, 0.2);
        border-radius:  100%;
    }
    @media screen and (min-width: 480px)  {
        form  {
            max-width:  480px;
        }
    }

    body {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        height: 100vh;
        background-color: #f2f2f2;
    }
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        max-width: 800px;
        width: 100%;
    }
    .form-container {
        flex: 1;
        margin-left: 20px; /* Adjust this value as needed */
    }
    .form-container form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-container img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

</style>

<body>
<div class="container">
    <div class="image-container">
        <img src="your_image_url.jpg" alt="Image Description">
    </div>
    <div class="form-container">
        <form action="takeaction.php" method="post">

            <h1>Sifalri 2015</h1>

            <fieldset>
                <legend><span class="number">1</span>Enter Your Details</legend>
                <label for="name">Name:</label>
                <input type="text" id="name" name="user_name">

                <label for="universityname">University/Collage:</label>
                <input type="email" id="mail" name="user_email">

                <label for="cityname">City Name:</label>
                <input type="email" id="mail" name="user_email">

                <label for="mail">Email:</label>
                <input type="email" id="mail" name="user_email">

                <label for="contactnumber">Contact No:</label>
                <input type="text" id="contactno" name="user_number">

            </fieldset>

            <fieldset>
                <legend><span class="number">2</span>Your profile Information</legend>
                <br></br>
                <label>You Are:</label>
                <input type="radio" name="howmuch" value="male">Single<br>
                <input type="radio" name="howmuch" value="female">Team</br>
                <br></br>
                <label for="bio">Detailed Information On What You Want To Perform:</label>
                <textarea id="bio" name="user_bio"></textarea>
            </fieldset>
            <fieldset>
                <label for="event_select_for">Select Event:</label>
                <select id="event_select" name="memeber_job">
                    <optgroup label="Single Member Events">
                        <option value="sdance">Solo Dancing</option>
                        <option value="code">Coding</option>
                        <option value="sbr">Slow Bike Race</option>
                        <option value="chess">Chess</option>
                        <option value="carrom">Carrom Board</option>
                    </optgroup>
                    <optgroup label="Group Events">
                        <option value="gdance">Solo Dancing</option>
                        <option value="rm">Rangoli Making</option>
                        <option value="cs">Lan Gaming 1 Counter Strike 1.6</option>
                        <option value="nfs">NFS Most Wanted 2005</option>
                    </optgroup>
                </select>
            </fieldset>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
</body>