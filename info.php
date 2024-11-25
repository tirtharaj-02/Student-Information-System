        <!DOCTYPE html>
        <html>
        <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <title>College Information</title>
          <style>
            body {
          font-family: Arial, sans-serif;
          font-size: medium;
        }

        header {
          background-color: #333;
          color: white;
          padding: 20px;
        }

        h1 {
          margin: 0;
        }

        .card {
          border: 1px solid #ccc;
          margin: 10px;
          padding: 10px;
          text-align: center;
        }

        .card img {
          max-width: 100%;
        }

        .section {
          margin-top: 30px;
        }

        .section1 {
          margin-top: 30px;
        }

        .section2 {
          margin-top: 30px;
        }

        .section h1 {
          margin-bottom: 10px;
        }

        .section p {
          line-height: 1.5;
        }

        .section2 h1 {
          font-size: 36px;
        }

        .faculty {
          display: flex;
          flex-wrap: wrap;
          position: relative;
        }

        .faculty h3 {
          margin-top: 30px;
          text-align: right;
        }

        .faculty .card {
          flex-basis: 30%;
        }

        .faculty img {
          border-radius: 50%;
          max-width: 80%;
        }

        footer {
          background-color: #333;
          color: white;
          padding: 20px;
          text-align: center;
        }
        .form {
          width: 50%;
          margin: right;
          padding: 20px;
          background-color: darkolivegreen;
          border-radius: 5px;
        }

        h3 {
          font-size: 20px;
          margin-bottom: 20px;
          margin-right: 5px;
        }

        form input[type="text"],
        form input[type="email"],
        form textarea {
          width: 50%;
          padding: 10px;
          margin-bottom: 20px;
          border: none;
          border-radius: 3px;
          font-size: 16px;
        }

        form textarea {
          height: 100px;
        }

        form button[type="submit"] {
          background-color: #4CAF50;
          color: white;
          border: none;
          border-radius: 3px;
          padding: 10px 20px;
          font-size: 16px;
          cursor: pointer;
        }

        button[type="submit"]:hover {
          background-color: orange;
        }
        .button {
              background-color: #007bff;
              color: #fff;
              border: none;
              padding: 10px 20px;
              border-radius: 5px;
              cursor: pointer;
              transition: all 0.2s ease;
            }
            
            .button:hover {
              background-color: green;
            }


          </style>
        </head>
        <body>
          <header>
            <h1>KCMIT COLLEGE</h1>
          </header>
          <main>
            <section class="faculty">
              <div class="card">
                <img src="kcmit1.jpg" alt="">
              </div>
              <!-- repeat the above card div for each faculty member -->
            </section>
            <section class="location">
                Location:<h2>Mid-Baneshwor,Kathmandu</h2>
            </section>
            <section class="contact">
              <div class="info">
                Landline:<h3>01-4579939</h3>
                Email Address:<h3>kcmitcollege@edu.np</h3>
              </div>
              <div class="form">
                <h2>Contact Us</h2>
                <form>
                  <input type="text" placeholder="Name">
                  <input type="email" placeholder="Email Address">
                  <textarea placeholder="Message"></textarea>
                  <button type="btn btn-success" class="btn btn-success">Submit</button>
                </form>
              </div>

              <div class="section">
          <h1> OUR MISSION </h1><p>
        To create an environment to produce business leaders and IT experts with commitment and a clear vision, who will substantially contribute to the nation building process.
            </p></div>

            <div class="section1">
          <h2> OUR HISTORY</h2><p>
        Kantipur Collage of Management and Information Technology was established in August 2000 by a group of management educationists and IT Professionals with wide and long years of experience in the field of teaching and education management. Today KCMIT has gone down in the history of education as the first college of the Tribhuvan University to introduce and implement the Bachelor in Information Management program (BIM)
        With a team of very co-operative and enthusiastic IT Experts and dedicated Faculty the ball was set rolling. Soon in 2004 the Bachelor in Business Administration program (BBA) was introduced. Possessing the essential requirements of quality education there was no looking back for KCMIT.
        Ever since its establishment, the objective of KCMIT has been to produce socially responsible, scientifically approached, Management and IT Professionals in the rapidly growing global job market. We have been on the education map for more than two decades and have successfully sent out several batches of students who have carved their careers in different fields in the national and international arenas
            </p>
            </div>
            <div class="section2">
                <h1>OUR VISION</h1>
            <P>
        To develop graduates who will visualize and skillfully grasp national and international opportunities of Business and IT.
            </P>
        </div>

        <div class="section faculty">
          <h1>Foreign Professor</h1>
          <div class="card">
            <img src="R.jpg">
            <h4>John Doe</h4>
            <p>Professor of Mathematics</p>
          </div>
          <div class="card">
            <img src="R1.png">
            <h4>Jane Smith</h4>
            <p>Associate Professor of English</p>
          </div>
          
          </div>
            </section>
          </main>
          <div> <input type=button class = "button "onClick="location.href='index.php'"value='Exit'></div>

          <footer class="footer">
            <p>&copy; My Website </p>
          </footer>
        </body>
        </html>
