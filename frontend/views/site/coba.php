<div class="site-coba">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <form>
      <input type="text" id="name" placeholder="Enter your name..." /> <br />
      <input type="text" id="age" placeholder="Enter your age..." /> <br />
      <input type="button" value="Submit" onclick="post();">
  </from>

  <div id="result"></div>

  <script type="text/javascript">
    function post(){
        var test = "this is an ajax test";
        var name = $('#name').val();
        var age = $('#age').val();

        $.ajax({
          url: '<?php echo \Yii::$app->getUrlManager()->createUrl('site/validate') ?>',
          type: 'POST',
          data: { posttest:test, postname:name, postage:age },
          success: function(data) {
            $('#result').html('test');
          }
        });
    }
  </script>

  <?php echo $model; ?>
</div>
