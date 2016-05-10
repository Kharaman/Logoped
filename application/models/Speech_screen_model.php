<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Speech_screen_model extends MY_model
{
    protected static $table = 'speech_screen';
    public $fields = ['children_id', 'ff_perception', 'study_year', 'diagnosis'];
    public $screen_data = [];
    public $screen_id;

    public function convert_data($temp)
    {
        $data = [];
        foreach ($temp as $row)
        {
            $key = $row['children_id'];
            if ( ! array_key_exists($key, $data))
            {
                $data[$key] = $row;
                unset($data[$key]['sounds_name']);
                unset($data[$key]['progress_symbol']);
                unset($data[$key]['sounds_transcription']);
            }
            $data[$key]['sounds'][$row['sounds_transcription']] = [
                'sounds_name' => $row['sounds_name'],
                'progress_symbol' => $row['progress_symbol']
            ];
        }
        return array_values($data);
    }

    public function convert_data_row($temp)
    {
        $data = [];
        foreach ($temp as $row)
        {
            $key = $row['children_id'];
            if ( ! array_key_exists($key, $data))
            {
                $data[$key] = $row;
                unset($data[$key]['sounds_name']);
                unset($data[$key]['progress_symbol']);
                unset($data[$key]['sounds_transcription']);
            }
            $data[$key]['sounds'][$row['sounds_transcription']] = [
                'progress_id' => $row['progress_id'],
                'progress_symbol' => $row['progress_symbol']
            ];
        }
        return array_values($data)[0];
    }

    public function insert_sounds($data)
    {
        return $this->db->insert_batch('screen_sounds_rel', $data);
    }

    public function get_all()
    {
        $this->db->select('
            sounds.name AS sounds_name,
            sounds.transcription AS sounds_transcription,
            progress_marks.symbol AS progress_symbol,
            speech_screen.id AS id,
            speech_screen.children_id AS children_id,
            speech_screen.study_year AS study_year,
            speech_screen.ff_perception AS ff_perception,
            speech_screen.diagnosis AS diagnosis,
            children.full_name AS full_name
        ');
        $this->db->join('sounds', 'sounds.id = screen_sounds_rel.sound_id', 'left');
        $this->db->join('progress_marks', 'progress_marks.id = screen_sounds_rel.progress_mark_id', 'left');
        $this->db->join('speech_screen', 'speech_screen.id = screen_sounds_rel.speech_screen_id', 'left');
        $this->db->join('children', 'children.id = speech_screen.children_id', 'left');
        $this->db->order_by('sounds.id, children.full_name');
        $query = $this->db->get('screen_sounds_rel');
        return $query->result_array();
    }

    public function get_one($id)
    {
        $this->db->select('
            sounds.name AS sounds_name,
            sounds.transcription AS sounds_transcription,
            progress_marks.symbol AS progress_symbol,
            progress_marks.id AS progress_id,
            speech_screen.id AS id,
            speech_screen.children_id AS children_id,
            speech_screen.study_year AS study_year,
            speech_screen.ff_perception AS ff_perception,
            speech_screen.diagnosis AS diagnosis,
            children.full_name AS full_name
        ');
        $this->db->join('sounds', 'sounds.id = screen_sounds_rel.sound_id', 'left');
        $this->db->join('progress_marks', 'progress_marks.id = screen_sounds_rel.progress_mark_id', 'left');
        $this->db->join('speech_screen', 'speech_screen.id = screen_sounds_rel.speech_screen_id', 'left');
        $this->db->join('children', 'children.id = speech_screen.children_id', 'left');
        $this->db->order_by('sounds.id, children.full_name');
        $this->db->where('speech_screen.id', $id);
        $query = $this->db->get('screen_sounds_rel');
        return $query->result_array();
    }



    public function prepare_addition($post)
    {
        foreach ($post as $k => $v) {
            if (strpos($k, 'sound_') === 0)
            {
                $sound_id = str_replace('sound_', '', $k);
                $sounds[] = [
                    'sound_id' => $sound_id,
                    'progress_mark_id' => $v
                ];
            }
            else if (in_array($k, $this->fields))
            {
                $this->screen_data[$k] = $v;
            }
            if ($k == 'id') {
                $this->screen_id = $v;
            }

            // copy in another place!!!!!!!!!!!!!!!
            //$this->db->where('speech_screen_id', $screen_id);
            //$this->db->update_batch('screen_sounds_rel', $sounds, 'sound_id');
        }
        return $sounds;
    }

    public function edit_sounds($id, $sounds)
    {
        $this->db->where('speech_screen_id', $id);
        return $this->db->update_batch('screen_sounds_rel', $sounds, 'sound_id');

    }

    public function delete($id)
    {
        $this->db->delete('screen_sounds_rel', ['speech_screen_id' => $id]);
        return $this->db->delete(self::$table, ['id' => $id]);
    }


}