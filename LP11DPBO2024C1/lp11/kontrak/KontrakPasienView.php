<?php

  interface KontrakPasienView {
      public function tampil();
      public function addForm();
      public function updateForm($id);
  }
