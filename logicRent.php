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
                        return "Pelanggan a/n <b> $this->nama </b> berstatus sebagai <b> Member, </b> <br> 
                        Mendapatkan diskon sebesar <b> 5% </b> <br> 
                        Jenis Motor yang dirental : <b> Motor $this->jenisMotor </b> <br> 
                        Lama waktu rental : <b> $this->lamaRental Hari </b> <br>
                        Total harga yang harus dibayarkan : <b> Rp. " . number_format($this->hargaTotal, 0, '', '.') . "</b>";
                } else {
                        $this->hargaTotal = $totalHarga;
                        return "Pelanggan a/n <b> $this->nama </b> tidak berstatus Member. <br>
                        Jenis Motor yang dirental : <b> Motor $this->jenisMotor </b> <br>
                        Lama waktu rental : <b> $this->lamaRental Hari </b> <br>
                        Total harga yang harus dibayarkan : <b> Rp. " . number_format($this->hargaTotal, 0, '', '.') . "</b>";
                }
        }

}

?>