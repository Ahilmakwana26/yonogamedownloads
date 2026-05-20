<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Yono Games</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, sans-serif; background: #F5F5F5; color: #000000; }
        .admin-container { display: flex; min-height: 100vh; }
        .admin-sidebar { width: 250px; background: #FFFFFF; padding: 30px 20px; border-right: 1px solid #E5E5E5; }
        .admin-sidebar h2 { margin-bottom: 30px; color: #000000; }
        .admin-sidebar a { display:block; color:#333333; text-decoration:none; padding:12px 15px; margin-bottom:8px; border-radius:8px; transition:all 0.3s; }
        .admin-sidebar a:hover, .admin-sidebar a.active { background:#000000; color:#FFFFFF; }
        .admin-content { flex:1; padding:30px; }
        .admin-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:30px; }
        .btn { padding:10px 20px; border-radius:8px; font-weight:600; cursor:pointer; border:none; text-decoration:none; display:inline-block; }
        .btn-primary { background:#000000; color:#FFFFFF; }
        .btn-danger { background:#ff4444; color:#fff; }
        .btn-secondary { background:#E5E5E5; color:#000000; }
        .table-container { background:#FFFFFF; border-radius:12px; overflow:hidden; border:1px solid #E5E5E5; }
        table { width:100%; border-collapse:collapse; }
        th, td { padding:15px; text-align:left; border-bottom:1px solid #E5E5E5; }
        th { background:#F5F5F5; font-weight:600; color:#333333; }
        .form-group { margin-bottom:20px; }
        .form-group label { display:block; margin-bottom:8px; font-weight:500; }
        .form-group input, .form-group textarea, .form-group select { width:100%; padding:12px; border-radius:8px; border:1px solid #E5E5E5; background:#FFFFFF; color:#000000; }
        .form-group textarea { min-height:120px; resize:vertical; }
        .card { background:#FFFFFF; padding:30px; border-radius:16px; margin-bottom:20px; border:1px solid #E5E5E5; }
        .login-container { max-width:400px; margin:100px auto; }
        .success, .error { padding:15px; border-radius:8px; margin-bottom:20px; }
        .success { background:rgba(0,0,0,0.05); color:#000000; border:1px solid #000000; }
        .error { background:rgba(255,68,68,0.1); color:#ff4444; }
    </style>
</head>
<body>