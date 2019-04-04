<?php

namespace Mal2Anilist;

/**
 * Class Mal2Anilist
 * @package Mal2Anilist
 */
class Mal2Anilist
{
    /**
     * @param int $malId
     * @return string|null
     */
    public function getAnilistUrl(int $malId): ?string
    {
        return $this->request($malId)->data->Media->siteUrl ?? null;
    }

    /**
     * @param int $id
     * @return \stdClass
     */
    private function request(int $id): \stdClass
    {
        $query = 'query($id: Int, $type: MediaType){Media(idMal: $id, type: $type){siteUrl}}';
        $data_string = json_encode(['query' => $query, 'variables' => ['id' => $id, 'type' => 'ANIME']]);
        $ch = curl_init('https://graphql.anilist.co');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string),
            ]
        );
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result);
    }
}
