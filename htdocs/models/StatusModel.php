<?php
require_once 'DAL/StatusDAO.php';

class StatusModel {
    public ?int $idStatus;
    public ?string $descricaoStatus;

    public function __construct(
        ?int $idStatus = null,
        ?string $descricaoStatus = null
    ) {
        $this->idStatus = $idStatus;
        $this->descricaoStatus = $descricaoStatus;
    }

    public function getStatuses() {
        $statusDAO = new StatusDAO();

        $statuses = $statusDAO->getStatus(); 

        $result = [];
        foreach ($statuses as $status) {
            $result[] = new StatusModel(
                $status['idStatus'],
                $status['descricaoStatus']
            );
        }

        return $result;
    }

    public function getStatus($idStatus) {
        $statusDAO = new StatusDAO();

        $status = $statusDAO->getStatusById($idStatus); 

        if ($status) {
            return new StatusModel(
                $status['idStatus'],
                $status['descricaoStatus']
            );
        }

        return null;
    }
}
?>
