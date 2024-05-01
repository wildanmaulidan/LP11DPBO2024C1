<?php

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getPasienById($id)
	{
		// Query mysql select data pasien by id
		$query = "SELECT * FROM pasien WHERE id=$id";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function addData($data)
	{
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];
		// Query mysql add data pasien
		$query = "INSERT INTO pasien VALUE('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function updateData($data)
	{
		$id = $data['id'];
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];
		// Query mysql update data pasien
		$query = "UPDATE pasien SET nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' WHERE id='$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function deleteData($id)
	{
		// Query mysql delete data pasien
		$query = "DELETE FROM pasien WHERE id=$id";
		// Mengeksekusi query
		return $this->execute($query);
	}
}
