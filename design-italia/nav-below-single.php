<nav id="nav-below" class="row navigation mt-5 mb-5" role="navigation">
  <div class="nav-previous col-6 text-left">
    <?php previous_post_link( '%link', '<div class="row"><div class="col-1 text-right"><span class="it-arrow-left"></span></div><div class="col-11">%title</div></div>' ); ?>
  </div>
  <div class="nav-next col-6 text-right">
    <?php next_post_link( '%link', '<div class="row"><div class="col-11">%title</div><div class="col-1 text-left"><span class="it-arrow-right"></span></div></div>' ); ?>
  </div>
</nav>