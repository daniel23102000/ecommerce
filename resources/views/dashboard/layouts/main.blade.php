<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Berani Digital Store | Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    <style>
      /* WYSIWYG Editor */
.wp-webdeasy-comment-editor {
  width: 40rem;
  min-height: 18rem;
  box-shadow: 0 0 4px 1px rgba(0, 0, 0, 0.3);
  border-top: 6px solid #4a4a4a;
  border-radius: 3px;
  margin: 2rem 0;
}
.wp-webdeasy-comment-editor .toolbar {
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
}
.wp-webdeasy-comment-editor .toolbar .line {
  display: flex;
  border-bottom: 1px solid #e2e2e2;
}
.wp-webdeasy-comment-editor .toolbar .line:last-child {
  border-bottom: none;
}
.wp-webdeasy-comment-editor .toolbar .line .box {
  display: flex;
  border-left: 1px solid #e2e2e2;
}
.wp-webdeasy-comment-editor .toolbar .line .box .editor-btn {
  display: block;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  transition: 0.2s ease all;
}
.wp-webdeasy-comment-editor .toolbar .line .box .editor-btn:hover, .wp-webdeasy-comment-editor .toolbar .line .box .editor-btn.active {
  background-color: #e1e1e1;
  cursor: pointer;
}
.wp-webdeasy-comment-editor .toolbar .line .box .editor-btn.icon img {
  width: 15px;
  padding: 9px;
  box-sizing: content-box;
}
.wp-webdeasy-comment-editor .toolbar .line .box .editor-btn.icon.smaller img {
  width: 16px;
}
.wp-webdeasy-comment-editor .toolbar .line .box .editor-btn.has-submenu {
  width: 20px;
  padding: 0 10px;
}
.wp-webdeasy-comment-editor .toolbar .line .box .editor-btn.has-submenu::after {
  content: '';
  width: 6px;
  height: 6px;
  position: absolute;
  background-image: url(https://img.icons8.com/ios-glyphs/30/000000/chevron-down.png);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  right: 4px;
}
.wp-webdeasy-comment-editor .toolbar .line .box .editor-btn.has-submenu .submenu {
  display: none;
  position: absolute;
  top: 34px;
  left: -1px;
  z-index: 10;
  background-color: #FFF;
  border: 1px solid #b5b5b5;
  border-top: none;
}
.wp-webdeasy-comment-editor .toolbar .line .box .editor-btn.has-submenu .submenu .btn {
  width: 39px;
}
.wp-webdeasy-comment-editor .toolbar .line .box .editor-btn.has-submenu .submenu:hover {
  display: block;
}
.wp-webdeasy-comment-editor .toolbar .line .box .editor-btn.has-submenu:hover .submenu {
  display: block;
}
.wp-webdeasy-comment-editor .content-area {
  padding: 15px 12px;
  line-height: 1.5;
}
.wp-webdeasy-comment-editor .content-area .visuell-view {
  outline: none;
  min-height: 12rem;
}
.wp-webdeasy-comment-editor .content-area .visuell-view p {
  margin: 12px 0;
}
.wp-webdeasy-comment-editor .content-area .html-view {
  outline: none;
  display: none;
  width: 100%;
  height: 200px;
  border: none;
  resize: none;
}
/* Modal */
.modal {
  z-index: 40;
  display: none;
}
.modal .modal-wrapper {
  background-color: #FFF;
  padding: 1rem;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 20rem;
  min-height: 10rem;
  z-index: 41;
}
.modal .modal-wrapper .close {
  position: absolute;
  top: 1rem;
  right: 1rem;
  cursor: pointer;
}
.modal .modal-wrapper .modal-content {
  flex-direction: column;
}
.modal .modal-wrapper .modal-content h3 {
  margin-top: 0;
}
.modal .modal-wrapper .modal-content input {
  margin: 1rem 0;
  padding: 0.5rem;
}
.modal .modal-wrapper .modal-content input[type="text"] {
  width: calc(100% - 1rem);
}
.modal .modal-wrapper .modal-content .row label {
  margin-left: 0.5rem;
}
.modal .modal-wrapper .modal-content button {
  background-color: #D2434F;
  border: 0;
  color: #FFF;
  padding: 0.5rem 1.2rem;
  cursor: pointer;
}
.modal .modal-bg {
  position: fixed;
  background-color: rgba(0, 0, 0, 0.3);
  width: 100vw;
  height: 100vh;
  top: 0;
  left: 0;
}
    </style>
  </head>
  <body>
    
@include('dashboard.layouts.header')

<div class="container-fluid">
  <div class="row">
    @include('dashboard.layouts.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('container')
    </main>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>

<script src="/js/dashboard.js"></script>
  </body>
</html>
