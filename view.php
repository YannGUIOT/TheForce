<?php
    class View {

        public function displayData($data) {
            foreach ($data as $row) {
                echo '<tr>
                          <td>' . $row['table'] . '</td>
                          <td>' . (string)$row['total'] . '</td>
                          <td>' . date('Y-m-d H:i:s', strtotime($row['date'])) . '</td>
                      </tr>';
            }
        }

        public function displayPercentages($totalDS, $totalJ) {
            $percentageDS = round((($totalDS) / ($totalDS + $totalJ)) * 100);
            $percentageJ = round((($totalJ) / ($totalDS + $totalJ)) * 100);
        
            $imageStyleDS = 'width: ' . $percentageDS . '%; display: block; margin: 0 auto;';
            $imageStyleJ = 'width: ' . $percentageJ . '%; display: block; margin: 0 auto;';
        
            return '<div class="col-md-4 max-width-350">
                        <div class="progress marginTop4">
                            <div class="progress-bar" 
                                 role="progressbar" 
                                 style="width:' . $percentageDS . '%;" 
                                 aria-valuenow="' . $percentageDS . '" 
                                 aria-valuemin="0" 
                                 aria-valuemax="100">
                            </div>
                        </div>
                        ' . $percentageDS . '%
                        <img src="./assets/img/dark-star.png" 
                             alt="Image 1" 
                             class="img-fluid" 
                             style="' . $imageStyleDS . '">
                    </div>
                    <div class="col-md-2 marginTop4 text-center">
                        <strong>FORCE POWER</strong>
                    </div>
                    <div class="col-md-4 max-width-350">
                        <div class="progress marginTop4">
                            <div class="progress-bar" 
                                 role="progressbar" 
                                 style="width:' . $percentageJ . '%;" 
                                 aria-valuenow="' . $percentageJ . '" 
                                 aria-valuemin="0" 
                                 aria-valuemax="100">
                            </div>
                        </div>
                        ' . $percentageJ . '% 
                        <img src="./assets/img/jedi.png" 
                             alt="Image 1" 
                             class="img-fluid" 
                             style="' . $imageStyleJ . '">
                    </div>';
        }
    }
?>
