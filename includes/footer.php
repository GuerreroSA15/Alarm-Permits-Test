
<footer>
    <div class="copy"><p>&copy; <a href="https://elpasotexas.gov" target="_blank">City of El Paso</a></p></div>
</footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
<script src="https://design.elpasotexas.gov/apps/symantic-javascript/tablesort.js"></script>
<script src="functions.js"></script>
<script type="text/javascript">
                          $('#phone').keyup(function(){
                          adddashes(this);
                        });

                      function adddashes(el){
                        let val = $(el).val().split('-').join('');      //remove all dashes (-)
                        if(val.length < 9){
                          let finalVal = val.match(/.{1,3}/g).join('-');//add dash (-) after every 3rd char.
                          $(el).val(finalVal);
                        }
                      }
                      </script>
<script src="https://design.elpasotexas.gov/apps/symantic-javascript/table-advanced.js"></script>

<script src="functions.js"></script>

<script>

  $(document).ready(function() {

      $('#example').DataTable();

  });

</script>
</body>
</html>