<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $data = json_decode(file_get_contents("php://input"));
    $id_progress = $data->id_progress;
    $id_plot = $data->id_plot; 

    if (!is_numeric($id_progress) || !is_numeric($id_plot)) {
        http_response_code(400); 
        echo json_encode(array("error" => "Invalid id_progress or id_plot"));
        exit;
    }

    
    $sql = "UPDATE plot SET id_progress_status = :id_progress_status WHERE id_plot = :id_plot";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_progress_status', $id_progress, PDO::PARAM_INT);
    $stmt->bindParam(':id_plot', $id_plot, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        
        echo json_encode(array("success" => "Progress status updated successfully"));
    } else {
        
        http_response_code(500); 
        echo json_encode(array("error" => "Failed to update progress status"));
    }
} else {
    
    http_response_code(405); 
    echo json_encode(array("error" => "Method not allowed"));
}
?>
