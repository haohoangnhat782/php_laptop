<?php
class NCCManage extends Controller{
    private $NCCModel;
    public function __construct(){

        $this->NCCModel = $this->model('nhacungcap');
    }

    public function index(){
        // if(isset($_SESSION['user']) && $_SESSION['user_privilege'])
        // {
        //     foreach ($_SESSION['user_privilege'] as $user_privilege) {
        //         if($user_privilege['privilege_id'] == 2)
        //         {
                    // $laptop = $this->laptopModel->getLaptop();
                    $NCC = $this->NCCModel->getNCC();
                    $this->view('pages/NCCManage', ['NCC' => $NCC]);
                    // break;
                // }
        //     } 
        // }
        // else
        // {
        //     return;
        // }
        
    }
    public function add_NCC(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten_ncc = $_POST['ten_ncc'];
            $dia_chi = $_POST['dia_chi'];
            $sdt = $_POST['sdt'];

            $this->NCCModel->addNCC($ten_ncc, $dia_chi, $sdt);
            echo json_encode(['status' => 'success']);
        }else{
            echo json_encode(['status' => 'fail']);
        }
    }
    public function edit_NCC(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ma_ncc = $_POST['ma_ncc'];
            $ten_ncc = $_POST['ten_ncc'];
            $dia_chi = $_POST['dia_chi'];
            $sdt = $_POST['sdt'];
            $this->NCCModel->editNCC($ma_ncc, $ten_ncc, $dia_chi, $sdt);
            echo json_encode(['status' => 'success']);
        }else{
            echo json_encode(['status' => 'fail']);
        }
    }
    public function delete_NCC()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ma_ncc = $_POST['id'];
    
            $this->NCCModel->deleteNCC($ma_ncc);
            echo json_encode(['status' => 'success']);
        }else{
            echo json_encode(['status' => 'fail']);
        }
    }
}
?>