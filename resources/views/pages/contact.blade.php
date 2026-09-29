<x-layouts.app>
    <style>
        .contactContainers{
            display: flex;
            padding: 40px;
        }
        .contactContainer {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }
        .contactContainer input{
            width: 650px;
        }
    </style>

    <div class="contactContainers">
    <form action="">
        <div class="contactContainer">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">
        </div>

        <div class="contactContainer">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">

        </div>

        <div class="contactContainer">
            <label for="subject">Subject</label>
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
        </div>
        <input type="submit" value="Submit">

    </form>
    </div>
</x-layouts.app>
