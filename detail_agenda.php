<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

$get_id = $_GET['post_id'];

?>

<?php include('./View/header.php')?>
<?php include('./View/navbar.php')?>

<!-- HEADER -->
<div class="fullscreen full-image">
    <div class="image">
        <img src="images/pengu.jpeg" style=""/>
    </div>
    <div class="overlay content-center first-content tertienary">
        <div class="content">
            <div class="row">
			    <div class="col-6">
                    <!-- <img class="responsive-img logo-stempel" src="images/logo imakom.png" style="width: 300px; height: 300px;" /> -->
                </div>
                <div class="col-6">
                    <h3 class="fw-black" style="color:tomato;">AGENDA KEGIATAN IMAKOM </h3>
                    <p>Segala kegiatan imakom akan update disini dalam bentuk artikel atau blog baik kegiatan di luar imakom maupun di dalam imakom sendiri</p><br/>
                    <a href="#first-content"><button class="scroll-for-more"></button></a>
                </div>
            </div>
            <div class="responsive-gap"></div>
        </div>
    </div>
</div>


<section class="posts-container" style="padding-bottom: 0;">

   <div class="box-container">

      <?php
         $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE status = ? AND id = ?");
         $select_posts->execute(['active', $get_id]);
         if($select_posts->rowCount() > 0){
            while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
               
            $post_id = $fetch_posts['id'];

          
      ?>
      <form class="box" method="post" >
         <input type="hidden" name="post_id" value="<?= $post_id; ?>">
         <input type="hidden" name="admin_id" value="<?= $fetch_posts['admin_id']; ?>">
         <div class="post-admin">
            <!-- <i class="fas fa-user"></i> -->
            <div>
               <!-- <a href="author_posts.php?author=<?= $fetch_posts['name']; ?>"><?= $fetch_posts['name']; ?></a> -->
               <div><?= $fetch_posts['date']; ?></div>
            </div>
         </div>
         
         <?php
            if($fetch_posts['image'] != ''){  
         ?>
         <img src="uploaded_img/<?= $fetch_posts['image']; ?>" class="post-image" alt="" style="height:400px; width:100%; border:2px solid black;">
         <?php
         }
         ?>
         <div class="post-title"><?= $fetch_posts['title']; ?></div>
         <div class="post-content" style="color:black;"><?= $fetch_posts['content']; ?></div>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no posts found!</p>';
      }
      ?>
   </div>

</section>
<br>

<!-- footer -->
<?php include('./View/footer.php')?>
<SCRIPT src="js/script.js"></SCRIPT>
</body>
</html>