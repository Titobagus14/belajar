<?php
	require("koneksi.php");
	require("Crud.class.php");

	if(isset($_POST['insert'])){
		$db = Database::connect();
		$siswa = new Siswa($db);

		$target_dir = "file/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // IF yg ini untuk mengecek apakah dia file image atau bukan, jika ingin bukan file image silahkan di hapus IF ini
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // // IF ini untuk mengecek apakah sudah ada file yg bernama sama dalam folder / yg sudah pernah d uploads
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }
        // IF ini digunakan untuk mengecek ukuran file, apabila lebih dari yg ditentukan maka tidak akan di upload
        if ($_FILES["foto"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // IF ini untuk mengijinkan file apa saja yg dibolehkan untuk di upload
        // Misal ingin menambahkan file doc, isi di bagian kondisi if dengan $imageFileType != "doc"
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "doc") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            $uploadOk = 1;
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
		$siswa->id_mahasiswa = $_POST['id_mahasiswa'];
		$siswa->nama = $_POST['nama'];
		$siswa->tanggal_lahir = $_POST['tanggal_lahir'];
		$siswa->jenis_kelamin = $_POST['jenis_kelamin'];
		$siswa->jurusan = $_POST['jurusan'];
		$siswa->alamat = $_POST['alamat'];
		$siswa->foto = basename($_FILES["foto"]["name"]);

		if(!$siswa->insert()){
			echo "Ada Error";
		}
		else{
			header('location:tampil.php');
		}
	}
	

	if(isset($_POST['update'])){
		$db = Database::connect();
		$mahasiswa = new Siswa($db);

		$target_dir = "file/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // IF yg ini untuk mengecek apakah dia file image atau bukan, jika ingin bukan file image silahkan di hapus IF ini
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // // IF ini untuk mengecek apakah sudah ada file yg bernama sama dalam folder / yg sudah pernah d uploads
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }
        // IF ini digunakan untuk mengecek ukuran file, apabila lebih dari yg ditentukan maka tidak akan di upload
        if ($_FILES["foto"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // IF ini untuk mengijinkan file apa saja yg dibolehkan untuk di upload
        // Misal ingin menambahkan file doc, isi di bagian kondisi if dengan $imageFileType != "doc"
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "doc") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            $uploadOk = 1;
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $mahasiswa->foto = basename($_FILES["foto"]["name"]);
		$mahasiswa->id_mahasiswa = $_POST['id_mahasiswa'];
		$mahasiswa->nama = $_POST['nama'];
		$mahasiswa->tanggal_lahir = $_POST['tanggal_lahir'];
		$mahasiswa->jenis_kelamin = $_POST['jenis_kelamin'];
		$mahasiswa->jurusan = $_POST['jurusan'];
		$mahasiswa->alamat = $_POST['alamat'];

		if(!$mahasiswa->update()){
			echo "Ada Error";
		}
		else{
			header('location:tampil.php');
		}
	}

	if(isset($_GET['hapus'])){
		$db = Database::connect();
		$mahasiswa = new Siswa($db);

		$mahasiswa->id_mahasiswa = $_GET['id_mahasiswa'];

		if(!$mahasiswa->delete()){
			echo "Ada Error";
		}
		else{
			header("location:tampil.php");
		}
	}

?>