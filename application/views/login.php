<?php $this->load->view('header')?>

<div class="wrapper">
    <form action="<?php echo base_url('Login/prosesLogin'); ?>" method="POST" class="form-signin">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="User" placeholder="Email Address" required="" autofocus="" />
      <input type="password" class="form-control" name="Password" placeholder="Password" required=""/>      
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
  </div>
<?php $this->load->view('footer')?>
 






