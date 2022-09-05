<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Main</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>
    <body>
      <?php require "components/navbar.php" ?>
      <div class="alert alert-success mt-3 pl-5" role="alert">
        <h3 class="alert-heading">List of conference</h2>
        <p>
          Here you can find all list of conference
        </p>
        <hr />   
        <p className="mb-0">
            If you want to see the details of the conference just click on it. To add a conference, click the Add button. To delete, click on the cross.
        </p>    
      </div>

      <table class="table table-dark table-hover" id="conferences-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Date</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody id='tbody'>
        </tbody>
      </table>

      <div class="d-flex justify-content-end">
        <a href="pages/creation.php">
          <button type="button" class="btn btn-success mr-5">Add</button>
        </a>
      </div>
      
      <script id='conference-load'>                                             //получения всех конференций 
        fetch('controllers/read_controller.php').then((res) => res.json())
          .then(res => {
            let tbody = document.getElementById('tbody');
            for(let i = 0; i < res.length; i++){
              let tr = document.createElement('tr');

              tr.innerHTML = `<th scope="row" id="${res[i].Id}">${res[i].Id}</th>
                <td>${res[i].Title}</td>
                <td>${res[i].MeetingDate}</td>
                <td><button type="button" class="btn btn-outline-danger">X</button></td>
              `;

              tbody.append(tr);
            }
            console.log(res);
            
          }).catch(error => console.log(error));
      </script>

      <script id='table-string-delete-or-detail'>       // удаления конфернеции либо получения деталий
        let table = document.getElementById('tbody');
        table.onclick = function(e){
          let target = e.target;
          if(target.tagName == 'BUTTON'){

            let strDelete = target.closest('tr');

            let id = strDelete.firstElementChild.id;
            fetch(`/controllers/delete_controller.php?id=${id}`).then((res) => res.json())
              .then((res) => console.log(res))
              .catch(error => console.log(error));
              
            strDelete.remove();
          } else { 
            let tr = target.closest('tr');
            let id = tr.firstElementChild.id;
            window.location.href = `/pages/details.php?id=${id}`;
          } 
        }
      </script>
      <script src="components/navibar.js"></script>  
    </body>
</html>