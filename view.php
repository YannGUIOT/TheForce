<?php
    class View {

        private $headerImg = "./assets/img/ForceHeader.png";
        private $banImg = "./assets/img/ForceBeWithU.png";
        private $darkSideImg = "./assets/img/dark-star.png";
        private $jediImg = "./assets/img/jedi.png";

        public function displayGlobalPage($totalDS, $totalJ, $data) {
            foreach ($data as $row) {
                $table .= '<tr>
                            <td>' . $row['table'] . '</td>
                            <td>' . $row['id'] . '</td>
                            <td>' . date('Y-m-d H:i:s', strtotime($row['date'])) . '</td>
                          </tr>';
            }
            $html = '<header class="bg-dark text-white text-center py-4">
                        <img src="'. $this->headerImg .'" class="img-fluid" alt="Image">
                    </header>
                    <div class="container mt-4">
                        <img src="'. $this->banImg .'" class="img-fluid" alt="Image">
                    </div>
                    <div class="container mt-4">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-8 col-lg-4">
                            <div class="d-md-flex flex-md-column">
                                <div class="d-flex flex-row align-items-center justify-content-center mt-4" style="gap: 0.5em;">
                                    <a href="index.php?action=addDarkSide" class="btn btn-dark btn-lg">Add Dark-Side Force</a>
                                </div>
                                <div class="d-flex flex-row align-items-center justify-content-center mt-4" style="gap: 0.5em;">
                                    <img src="'. $this->darkSideImg .'" class="img-fluid" alt="Image" width="150" height="150">
                                    <div>
                                        <div>Force:</div>
                                        <div><strong>'. $totalDS .'</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-4">
                            <div class="d-md-flex flex-md-row">
                                <div class="flex-md-column">
                                    <div class="table-responsive" style="max-height: 250px; margin-top: 1em;">
                                        <table class="table" style="border-collapse: separate; border-spacing: 1em;">
                                            <thead>
                                                <tr>
                                                    <th>Table</th>
                                                    <th>ID</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                '. $table .'
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-4">
                            <div class="d-md-flex flex-md-column">
                                <div class="d-flex flex-row align-items-center justify-content-center mt-4" style="gap: 0.5em;">
                                    <a href="index.php?action=addJedi" class="btn btn-dark btn-lg">Add Jedi Force</a>
                                </div>
                                <div class="d-flex flex-row align-items-center justify-content-center mt-4" style="gap: 0.5em;">
                                <div>
                                <div>Force:</div>
                                <div><strong>'. $totalJ .'</strong></div>
                            </div>
                                    <img src="'. $this->jediImg .'" class="img-fluid" alt="Image" width="150" height="150">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center text-center">
                        <div class="d-md-flex flex-md-column mt-4">
                            <div class="d-md-flex flex-lg-row">
                                <div id="chart1" style="width:300px; height:300px;" class="container mt-4"></div>
                                <div id="chart2" style="width:300px; height:300px;" class="container mt-4"></div>
                                <div id="chart3" style="width:300px; height:300px;" class="container mt-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
';
            echo $html;
        }
    }
?>
