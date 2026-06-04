<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD']==='OPTIONS'){http_response_code(200);exit;}
require_once 'koneksi.php';

$id_jadwal = intval($_POST['id_jadwal'] ?? $_GET['id_jadwal'] ?? 0);
if (!$id_jadwal) {
    echo json_encode(['status'=>'error','message'=>'id_jadwal tidak valid']); exit;
}

if ($conn->query("DELETE FROM data_jadwal WHERE id_jadwal=$id_jadwal")) {
    echo json_encode(['status'=>'success','message'=>'Jadwal dihapus']);
} else {
    echo json_encode(['status'=>'error','message'=>$conn->error]);
}
$conn->close();
?>
