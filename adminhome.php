<?php
session_start();
if(!isset($_SESSION['username'])){
	header("location:login.php");
}
elseif($_SESSION['usertype']=='client'){
	header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #2c3e50;
            padding-top: 20px;
            color: #fff;
            overflow-y: auto;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a:hover {
            background-color: #34495e;
            border-radius: 4px;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }

        h1 {
            color: #2c3e50;
            margin: 0;
        }

        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #2980b9;
        }

        form {
            margin: 0;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"],
        select,
        textarea,
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        .radio-group,
        .checkbox-group {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
        }

        .file-upload {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="#new-case">New Case</a></li>
            <li><a href="#case-details">Case Details</a></li>
            <li><a href="#client-details">Client Details</a></li>
            <li><a href="#employee-details">Employee Details</a></li>
            <li><a href="#office-rent-details">Office Rent Details</a></li>
            <li><a href="#income-tax-details">Income Tax Details</a></li>
            <li><a href="#stationary-update">Stationary Update</a></li>
            <li><a href="#income">Income</a></li>
            <li><a href="#documents">Documents</a></li>
            <li><a href="#notary">Notary</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h1>Admin Home</h1>
        <a href="logout.php" class="button logout-button">Logout</a>
        <div id="new-case" class="section">
            <h2>New Case</h2>
            <form>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                </div>

                <div class="form-group">
                    <label>Sex:</label>
                    <div class="radio-group">
                        <label><input type="radio" id="male" name="sex" value="male"> Male</label>
                        <label><input type="radio" id="female" name="sex" value="female"> Female</label>
                        <label><input type="radio" id="not-mentioned" name="sex" value="not-mentioned"> Not Mentioned</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob">
                </div>

                <div class="form-group">
                    <label for="aadhaar">Adhaar No:</label>
                    <input type="text" id="aadhaar" name="aadhaar">
                </div>

                <div class="form-group">
                    <label for="pan">PAN No:</label>
                    <input type="text" id="pan" name="pan">
                </div>

                <div class="form-group">
                    <label for="address">Full Address (As per Aadhar):</label>
                    <textarea id="address" name="address"></textarea>
                </div>

                <label for="state">Select State:</label>
                <select id="state" name="state">
                    <option value="" disabled selected>Select State</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                    <option value="Chandigarh">Chandigarh</option>
                    <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                    <option value="Lakshadweep">Lakshadweep</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Puducherry">Puducherry</option>
                    <option value="Ladakh">Ladakh</option>
                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                    <!-- Add state options here -->
                </select><br>

                <label for="district">Select District:</label>
                <select id="district" name="district">
                    
                    <option value="" disabled selected>Select District</option>
                    <option value="Alirajpur">Alirajpur</option>
                    <option value="Anuppur">Anuppur</option>
                    <option value="Ashoknagar">Ashoknagar</option>
                    <option value="Balaghat">Balaghat</option>
                    <option value="Barwani">Barwani</option>
                    <option value="Betul">Betul</option>
                    <option value="Bhind">Bhind</option>
                    <option value="Bhopal">Bhopal</option>
                    <option value="Burhanpur">Burhanpur</option>
                    <option value="Chhatarpur">Chhatarpur</option>
                    <option value="Chhindwara">Chhindwara</option>
                    <option value="Damoh">Damoh</option>
                    <option value="Datia">Datia</option>
                    <option value="Dewas">Dewas</option>
                    <option value="Dhar">Dhar</option>
                    <option value="Dindori">Dindori</option>
                    <option value="Guna">Guna</option>
                    <option value="Gwalior">Gwalior</option>
                    <option value="Harda">Harda</option>
                    <option value="Hoshangabad">Hoshangabad</option>
                    <option value="Indore">Indore</option>
                    <option value="Jabalpur">Jabalpur</option>
                    <option value="Jhabua">Jhabua</option>
                    <option value="Katni">Katni</option>
                    <option value="Khandwa">Khandwa</option>
                    <option value="Khargone">Khargone</option>
                    <option value="Mandla">Mandla</option>
                    <option value="Mandsaur">Mandsaur</option>
                    <option value="Morena">Morena</option>
                    <option value="Narsinghpur">Narsinghpur</option>
                    <option value="Neemuch">Neemuch</option>
                    <option value="Panna">Panna</option>
                    <option value="Raisen">Raisen</option>
                    <option value="Rajgarh">Rajgarh</option>
                    <option value="Ratlam">Ratlam</option>
                    <option value="Rewa">Rewa</option>
                    <option value="Sagar">Sagar</option>
                    <option value="Satna">Satna</option>
                    <option value="Sehore">Sehore</option>
                    <option value="Seoni">Seoni</option>
                    <option value="Shahdol">Shahdol</option>
                    <option value="Shajapur">Shajapur</option>
                    <option value="Sheopur">Sheopur</option>
                    <option value="Shivpuri">Shivpuri</option>
                    <option value="Sidhi">Sidhi</option>
                    <option value="Singrauli">Singrauli</option>
                    <option value="Tikamgarh">Tikamgarh</option>
                    <option value="Ujjain">Ujjain</option>
                    <option value="Umaria">Umaria</option>
                    <option value="Vidisha">Vidisha</option>
                    <!-- Add district options here -->
                </select><br>

                <label for="pin">Pin Code:</label>
                <input type="text" id="pin" name="pin"><br>

                <label for="mobile">Mobile Number:</label>
                <input type="text" id="mobile" name="mobile"><br>

                <label for="additional-mobile">Additional Mobile Number:</label>
                <input type="text" id="additional-mobile" name="additional-mobile"><br>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email"><br>

                <label for="case-type">Case Type:</label>
                <select id="case-type" name="case-type">
                    <option value="" disabled selected>Select Case Type</option>
                    <option value="R.C.A.">R.C.A.</option>
                    <option value="M.C.A.">M.C.A.</option>
                    <option value="Civil M.A.">Civil M.A.</option>
                    <option value="Civil Revn.">Civil Revn.</option>
                    <option value="Civil Suit">Civil Suit</option>
                    <option value="Marriage Petn.">Marriage Petn.</option>
                    <option value="L.A.R.">L.A.R.</option>
                    <option value="Darkhast">Darkhast</option>
                    <option value="L.R.DKST.">L.R.DKST.</option>
                    <option value="Elec.Petn.">Elec.Petn.</option>
                    <option value="C.Appln.">C.Appln.</option>
                    <option value="M.A.C.P.">M.A.C.P.</option>
                    <option value="MACP. M.A.">MACP. M.A.</option>
                    <option value="MACP. Dkst.">MACP. Dkst.</option>
                    <option value="I.C.M.A.">I.C.M.A.</option>
                    <option value="R.C.S.">R.C.S.</option>
                    <option value="Munci. Appeal">Munci. Appeal</option>
                    <option value="Spl.C.S.">Spl.C.S.</option>
                    <option value="L.R.M.A.">L.R.M.A.</option>
                    <option value="Arbitration Case">Arbitration Case</option>
                    <option value="MACP C Appln.">MACP C Appln.</option>
                    <option value="Reg Dkst">Reg Dkst</option>
                    <option value="Spl .Dkst">Spl .Dkst</option>
                    <option value="MACP Spl.">MACP Spl.</option>
                    <option value="Rent Appeal">Rent Appeal</option>
                    <option value="M.A.N.R.J.I.">M.A.N.R.J.I.</option>
                    <option value="Small Cause Suit">Small Cause Suit</option>
                    <option value="Rent Suit">Rent Suit</option>
                    <option value="Trust Appeal">Trust Appeal</option>
                    <option value="Trust Suit">Trust Suit</option>
                    <option value="Sum.Civ.Suit">Sum.Civ.Suit</option>
                    <option value="Mesne Profit">Mesne Profit</option>
                    <option value="Succession">Succession</option>
                    <option value="Final Decree">Final Decree</option>
                    <option value="Small Cause Dkst">Small Cause Dkst</option>
                    <option value="Insolvency">Insolvency</option>
                    <option value="Probate">Probate</option>
                    <option value="Guardian Wards Case">Guardian Wards Case</option>
                    <option value="Contempt Proceeding">Contempt Proceeding</option>
                    <option value="Review Appln.">Review Appln.</option>
                    <option value="Pauper Appln.">Pauper Appln.</option>
                    <option value="Arbitration R.D">Arbitration R.D</option>
                    <option value="Spl. Marriage Petn.">Spl. Marriage Petn.</option>
                    <option value="W.C.F.A.Case">W.C.F.A.Case</option>
                    <option value="W.C.N.F.A. Case">W.C.N.F.A. Case</option>
                    <option value="E.S.I.Act Case">E.S.I.Act Case</option>
                    <option value="Suit Trade Mark Act">Suit Trade Mark Act</option>
                    <option value="Suit Indian Divorce Act">Suit Indian Divorce Act</option>
                    <option value="Spl.Sum.Suit">Spl.Sum.Suit</option>
                    <option value="Reg.Sum.Suit">Reg.Sum.Suit</option>
                    <option value="Other Misc.Appln.">Other Misc.Appln.</option>
                    <option value="Election Appeal">Election Appeal</option>
                    <option value="Civil Appeal PPE">Civil Appeal PPE</option>
                    <option value="Std. Rent Appln.">Std. Rent Appln.</option>
                    <option value="MACP M.A.N.R.J.I.">MACP M.A.N.R.J.I.</option>
                    <!-- Add case type options here -->
                </select><br>

                <label for="filing-date">Filing Date:</label>
                <input type="text" id="filing-date" name="filing-date" placeholder="dd-mm-yyyy"><br>

                <label for="advance-payment">Advance Payment:</label>
                <input type="text" id="advance-payment" name="advance-payment"><br>

                <label for="total-payment">Total Payment:</label>
                <input type="text" id="total-payment" name="total-payment"><br>

                <label for="remaining-payment">Remaining Payment:</label>
                <input type="text" id="remaining-payment" name="remaining-payment"><br>

                <label for="file">Attach File:</label>
                <input type="file" id="file" name="file"><br>

                <input type="submit" value="Submit">
            </form>
        </div>

        <div id="case-details" class="section">
            <h2>Case Details</h2>
            <h3>mahesh gupta 45/2024</h3>
            <textarea></textarea>
            <h3>ankit singh 746/23</h3>
            <textarea></textarea>
        </div>

        <div id="client-details" class="section">
            <h2>Client Details</h2>
            <h3>suresh gupta 98/2024</h3>
            <textarea></textarea>
            <h3>param singh 736/23</h3>
            <textarea></textarea>
        </div>

        <div id="employee-details" class="section">
            <h2>Employee Details</h2>
            <p>a. Rakesh Yadav (6754)</p>
            <p>b. Surendra Singh (3456)</p>
        </div>

        <div id="office-rent-details" class="section">
            <h2>Office Rent Details</h2>
            <textarea></textarea>
        </div>

        <div id="income-tax-details" class="section">
            <h2>Income Tax Details</h2>
            <textarea></textarea>
        </div>

        <div id="stationary-update" class="section">
            <h2>Stationary Update</h2>
            <label><input type="checkbox"> Item 1</label>
            <label><input type="checkbox"> Item 2</label>
            <!-- Add more items as needed -->
        </div>

        <div id="income" class="section">
            <h2>Income</h2>
            <textarea placeholder="Add note here..."></textarea>
        </div>

        <div id="documents" class="section">
            <h2>Documents</h2>
            <input type="file" multiple><br>
        </div>

        <div id="notary" class="section">
            <h2>Notary</h2>
            <input type="file" multiple><br>
            <textarea placeholder="Add text here..."></textarea>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const links = document.querySelectorAll('.sidebar ul li a');
            const sections = document.querySelectorAll('.main-content .section');

            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    sections.forEach(section => {
                        if (section.id === targetId) {
                            section.classList.add('active');
                        } else {
                            section.classList.remove('active');
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
