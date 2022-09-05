<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Details</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <style>
            #map{
                height: 500px;
                width: 100%;
            }
        </style>
    </head>
    <body>
      <?php require "../components/navbar.php" ?>
      <div class="d-flex justify-content-center mt-4">
        <h2 class="display-3">Details of your conference</h>
      </div>
      <div class="jumbotron jumbotron-fluid bg-dark text-white container mt-5">
        <div class="container">
          <h3 id='title'>Title: </h3>
          <h3 id='meetingdate' class='mt-5'>Date: </h3>
          <h3 id='address' class='mt-5'>Address: </h3>
          <div id="map"></div>
          <h3 id='country' class='mt-5'>Country: </h3>
        </div>
        <div class="d-flex justify-content-end mr-5">
            <button id='edit' type="button" class="btn btn-light btn-lg">Edit</button>
        </div>

        <div class="d-flex justify-content-end mt-4 mr-5">
            <button id='deleteButton' type="button" class="btn btn-danger btn-lg">Delete</button>
        </div>
      </div>
      <script>
        let url = new URL(window.location.href);
        let id = url.searchParams.get("id");
        fetch(`/controllers/details_controller.php?id=${id}`).then((res) => res.json())
              .then((res) =>{
                let title = document.getElementById('title');
                let meetingdate = document.getElementById('meetingdate');                                                                        
                let country = document.getElementById('country'); 

                title.append(res[0].Title);
                meetingdate.append(res[0].MeetingDate);
                country.append(res[0].Country);
              })
              .catch(error => console.log(error));
        
        let edit = document.getElementById('edit');
        edit.onclick = function(){
          fetch(`/controllers/details_controller.php?id=${id}`).then((res) => res.json())
              .then((res) =>{
                let address = res[0].Address;
                window.location.href = `/pages/edit.php?id=${id}&address=${address}`;
              })
        }

        let deleteButton = document.getElementById('deleteButton');
        deleteButton.onclick = function(){
          fetch(`/controllers/delete_controller.php?id=${id}`).then((res) => res.json())
              .then((res) => console.log(res))
              .catch(error => console.log(error));

              window.location.href = '/';
        }

      </script>
      <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6GMSRW9oWdCkt8bOkb--KtzGDnDnYQ1Q&callback=initMap&v=weekly"
        defer
      ></script>
      <script src="../components/detailMap.js"></script>
      <script src="../components/navibar.js"></script> 
      <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    </body>
</html>