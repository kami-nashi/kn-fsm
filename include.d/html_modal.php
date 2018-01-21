<?php

#opening html of modal1
echo'
<div id="modalOne" class="modal">
  <div class="modal-content">
    <div class="modal-header">
    <h2>Add Session Time</h2>
      <span class="close">&times;</span>
        </div>
    <div>
';

require 'include.d/data_form.php';

#closing html of modal1 and opening of modal2
echo '
    </div>
  </div>
</div>

<div id="modalTwo" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <h2>Add Maintenance</h2>
        <span class="close">&times;</span>
         </div>
    <div>
';

require 'include.d/data_form_maintenance.php';


#closing html of modal2
echo '
    </div>
  </div>
</div>
';

?>
