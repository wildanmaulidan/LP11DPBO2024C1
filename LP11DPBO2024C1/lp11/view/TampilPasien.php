<?php

include_once("kontrak/KontrakPasienView.php");
include_once("presenter/ProsesPasien.php");

class TampilPasien implements KontrakPasienView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>
				<a href='index.php?edit=" . $i . "'><button type='button' class='btn btn-warning text-white'>Edit</button></a>
				<a href='index.php?delete=" . $this->prosespasien->getId($i) . "'><button type='button' class='btn btn-danger'>Delete</button></a>
			</td>
			</tr>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function addForm()
	{	
		$listGender = ['Laki-laki', 'Perempuan'];
		$dataOptionGender = '<option value="">-</option>';

        foreach ($listGender as $gender)
		{
            $dataOptionGender .= '<option value="' . $gender. '">' . $gender . '</option>';
        }

		$this->tpl = new Template("templates/skinForm.html");
		$this->tpl->replace("DATA_GENDER", $dataOptionGender);
		$this->tpl->replace("DATA_TITLE", "ADD");
		$this->tpl->replace("SUBMIT", "add");
		$this->tpl->write();

	}

	function updateForm($id)
	{	
		$listGender = ['Laki-laki', 'Perempuan'];
		$dataOptionGender = '<option value="">-</option>';

		$this->prosespasien->prosesDataPasien();

        foreach ($listGender as $gender)
		{
			if ($gender == $this->prosespasien->getGender($id)) {
				$dataOptionGender .= '<option value="' . $gender . '" selected>' . $gender . '</option>';
			} else {
				$dataOptionGender .= '<option value="' . $gender . '">' . $gender . '</option>';
			}
        }

		
		$this->tpl = new Template("templates/skinForm.html");
		$this->tpl->replace("DATA_ID", $this->prosespasien->getId($id));
		$this->tpl->replace("DATA_NIK", $this->prosespasien->getNik($id));
		$this->tpl->replace("DATA_NAMA", $this->prosespasien->getNama($id));
		$this->tpl->replace("DATA_TEMPAT", $this->prosespasien->getTempat($id));
		$this->tpl->replace("DATA_TL", $this->prosespasien->getTl($id));
		$this->tpl->replace("DATA_EMAIL", $this->prosespasien->getEmail($id));
		$this->tpl->replace("DATA_TELP", $this->prosespasien->getTelp($id));
		$this->tpl->replace("DATA_GENDER", $dataOptionGender);
		$this->tpl->replace("DATA_TITLE", "UPDATE");
		$this->tpl->replace("SUBMIT", "update");
		$this->tpl->write();

	}

	function processAdd($data){
		$this->prosespasien->processAdd($data);
		header('location:index.php');
	}

	function processUpdate($data){
		$this->prosespasien->processUpdate($data);
		header('location:index.php');
	}

	function processDelete($id){
		$this->prosespasien->processDelete($id);
		header('location:index.php');
	}
}
