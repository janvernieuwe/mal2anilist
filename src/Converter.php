<?php

namespace Mal2Anilist;

/**
 * Class Converter
 * @package Converter
 */
class Converter
{
    /**
     * @param int $malId
     * @return string|null
     */
    public function getAnilistUrl(int $malId): ?string
    {
        $query = 'query($id: Int, $type: MediaType){Media(idMal: $id, type: $type){siteUrl}}';
        $data = json_encode(['query' => $query, 'variables' => ['id' => $malId, 'type' => 'ANIME']]);
        return $this->request($data)->data->Media->siteUrl ?? null;
    }

    /**
     * @param string $body
     * @return \stdClass
     */
    private function request(string $body): \stdClass
    {
        $ch = curl_init('https://graphql.anilist.co');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($body),
            ]
        );
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result);
    }
}
