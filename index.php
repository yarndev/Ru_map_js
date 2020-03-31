<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Калькулятор вашей выгоды при использовании E2B</title>
  <meta name="description" content="JSMaps - Responsive Javascript Maps - http://jsmaps.io">
  <meta name="author" content="LGLab">

  <!-- Demo scripts -->
  <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap.css" >



  <style type="text/css">
    html {
      box-sizing: border-box;
    }
    *, *:before, *:after {
      box-sizing: inherit;
    }

    body {
      font-family: 'Droid Sans', sans-serif;
      background:#f2f2f2;
      font-size:14px;
      line-height:21px;
    }

    .container {
      width: 960px;
      margin:20px auto;
    }

    @media only screen and (min-width: 768px) and (max-width: 1000px) {
      .container {
        width: 768px;
      }
    }
    @media only screen and (max-width: 767px) {
      .container {
        width: 420px;
      }
    }
    @media only screen and (max-width: 480px) {
      .container {
        width: 300px;
      }
    }

    a img {
      border:none;
    }

    h1, h2, h3, h4, h5, h6{ 
      font-weight:normal; 
    }
    h1{ 
      font-size:26px; 
      line-height:32px; 
    }
    p, ul{
      margin-bottom:10px;
    }

    .textinfo {
      font-weight: 500;
      font-size: 24px;
    }

  </style>
  <!-- End Demo scripts -->

  <!-- Jquery is required, embed on your page if not already - don't embed 2 versions -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
  <!-- End Jquery -->

  <!-- Map scripts - add the below to your page -->
  <!-- jsmaps-panzoom.js is optional if you are using enablePanZoom -->
  <link href="jsmaps/jsmaps.css" rel="stylesheet" type="text/css" />
  <script src="jsmaps/jsmaps-libs.js" type="text/javascript"></script>
  <script src="jsmaps/jsmaps-panzoom.js"></script>
  <script src="jsmaps/jsmaps.min.js" type="text/javascript"></script>
  <script src="maps/russia.js" type="text/javascript"></script>
  <!-- End Map scripts -->

</head>

<body>

  <div class="container shsh">

    <!-- Map html - add the below to your page -->
    <div class="jsmaps-wrapper" id="russia-map"></div>
    <!-- End Map html -->
  </div>

  <div class="modal fade" id="fileinputmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <form method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Расcчитать экономию</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
          
          <div class="gpp">
            <label for="recipient-name" class="col-form-label">Зона деятельности гарантирующего поставщика:</label>
            <input readonly type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-row">
            <div class="col-form-label">
      <select name="period" class="custom-select " id="monthperiod">
        <option value="1" >Январь 2019 </option>
       <option value="2" >Февраль 2019 </option>
<option value="3">Март 2019  </option>
<option value="4">Апрель 2019 </option>
<option value="5">Май 2019 </option>
<option value="6">Июнь 2019 </option>
<option value="7">Июль 2019 </option>
<option value="8">Август 2019 </option>
<option value="9">Сентябрь 2019 </option>
<option value="10">Октябрь 2019 </option>
<option value="11">Ноябрь 2019 </option>
<option value="12">Декабрь 2019 </option>
      </select>
      <label for="monthperiod">Выберите период</label>
    </div>
    <div class="col-form-label">
 <select name="power" class="custom-select " id="powcat">
        <option value="01">Менее 670 кВт</option>
        <option value="01">от 670 кВт до 10 мВт</option>
         <option value="01">более 10 мВт</option>
      </select>
      <label for="monthperiod">Выберите мощность прибора \ приборов</label>
    </div>
  </div>
      <div class="alert alert-success">Загрузите фактические объемы потребления за выбранный период в формате XLS</div>
      <div class="input-group mb-3 shsh" >
  <div class="input-group-prepend" >
    <span class="input-group-text">Загрузить</span>
  </div>
  <div class="custom-file" >
    <input type="file" class="custom-file-input" id="inputGroupFile01" >
    <label class="custom-file-label" for="inputGroupFile01">a</label>
  </div>
</div></form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary">Отправить</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalresult" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Результат</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Выгода от сотрудничества с нами в </h4><h4> [Период] </h4><h4>составила бы</h4><h4> [sum] </h4><h4>рублей</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
     
      </div>
    </div>
  </div>
</div>

<a href="#" onclick="$('#modalresult').modal('show')
">fffff</a>
  <script type="text/javascript">

    $(function() {
      
      $('#russia-map').JSMaps({
        map: 'russia'
      });

    });
    
  </script>
<script type="text/javascript">
  $('#fileinputmodal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('gp') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)

  modal.find('.gpp input').val(recipient)

})
</script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>

</body>


</html>