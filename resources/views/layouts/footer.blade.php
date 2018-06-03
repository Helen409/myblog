<footer class="page-footer">
  <div class="footer-heading text-center ">

      <div class="col-md-12">

        <h5 class="text-uppercase">chammy blog</h5>
        
      </div>
   </div>

  <div class="text-center">   

     <div class="text-center"> Вы вошли как  {{ Auth::user()->name }}({{ Auth::user()->role }})</div>
 	 <div class="footer-copyright text-center">© 2018 Copyright  </div>
  </div>


</footer>