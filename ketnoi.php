<?php
class Ketnoi {
    private $servername = "sql305.byethost33.com";
    private $username = "b33_37017408";
    private $password = "123123";
    private $dbname = "b33_37017408_sunshineshop";
    protected $conn = null;

    // Bước 1: Tạo kết nối
    public function __construct() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        // Kiểm tra kết nối
        if (mysqli_connect_errno()) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        // Thiết lập mã hóa ký tự cho kết nối
        if (!mysqli_set_charset($this->conn, "utf8mb4")) {
            die("Không thể thiết lập mã hóa ký tự: " . mysqli_error($this->conn));
        }
    }

    // Phương thức để thực thi truy vấn SQL
    public function query($sql) {
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("Lỗi truy vấn: " . mysqli_error($this->conn));
        }
        return $result;
    }

    // Phương thức để lấy kết quả truy vấn dưới dạng mảng kết hợp
    public function fetchAssoc($result) {
        return mysqli_fetch_assoc($result);
    }

    // Phương thức đóng kết nối
    public function close() {
        mysqli_close($this->conn);
    }
}
?>
