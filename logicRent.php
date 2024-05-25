<?php

class RentalMotor {
        protected $nama,
                $lamaRental,
                $jenisMotor,
                $hargaRental = [
                        'Matic' => 70000,
                        'Manual' => 60000,
                        'Sport' => 10000,
                        'Listrik' => 85000,
                ],
                $ppn = 10000,
                $diskonMember = 0.05,
                $hargaTotal;

        public function __construct($nama, $lamaRental, $jenisMotor) {
                $this->nama = $nama;
                $this->lamaRental = $lamaRental;
                $this->jenisMotor = $jenisMotor;
        }

        public function getHarga() {
                $dataHarga = $this->hargaRental[$this->jenisMotor];
                $hargaBeli = $dataHarga * $this->lamaRental;
                $ppn = $this->ppn;
                $totalHarga = $hargaBeli + $ppn;

                # Cek User adalah Member
                $namaMember = ["andika", "aca",  "cahyo",  "alaisya"];
                $isMember = in_array(strtolower($this->nama), $namaMember);

                if ($isMember) {
                        $diskon = $totalHarga * $this->diskonMember;
                        $this->hargaTotal = $totalHarga - $diskon;
                        return "Pelanggan $this->nama berstatus sebagai member, <br> 
                        Mendapatkan diskon sebesar 5% <br> 
                        Jenis Motor yang dirental : Motor $this->jenisMotor <br> 
                        Lama waktu rental : $this->lamaRental hari <br>
                        Total harga yang harus dibayarkan : Rp. " . number_format($this->hargaTotal, 0, '', '.');
                } else {
                        $this->hargaTotal = $totalHarga;
                        return "Pelanggan $this->nama tidak berstatus member. <br>
                        Jenis Motor yang dirental : Motor $this->jenisMotor <br>
                        Lama waktu rental $this->lamaRental hari <br>
                        Total harga yang harus dibayarkan : Rp. " . number_format($this->hargaTotal, 0, '', '.');
                }
        }

}

?>