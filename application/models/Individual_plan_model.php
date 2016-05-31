<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Individual_plan_model extends MY_model
{
    protected static $table = 'individual_plan';
    public $fields = ['children_id', 'whistling', 'hissing', 'sonor', 'affricate', 'other_sounds'];
    public $plan_data = [];
    public $plan_id;

    public function prepare_addition($post)
    {
        foreach ($post as $k => $v) {
            if (strpos($k, 'sound_') === 0)
            {
                $sound_id = str_replace('sound_', '', $k);
                $sounds[] = [
                    'sound_id' => $sound_id,
                    'is_done' => $v
                ];
            }
            else if (in_array($k, $this->fields))
            {
                $this->plan_data[$k] = $v;
            }
            if ($k == 'id') {
                $this->plan_id = $v;
            }

        }
        return $sounds;
    }

    public function insert_sounds($data)
    {
        return $this->db->insert_batch('plan_sounds_rel', $data);
    }

    public function get_added_children()
    {
        $this->db->select('
            individual_plan.id AS id,
            individual_plan.children_id AS children_id,
            children.full_name AS full_name,
            children.photo AS children_photo
        ');
        $this->db->join(self::$table, 'individual_plan.children_id = children.id');
        $query = $this->db->get('children');
        return $query->result();
    }

    public function get_one($id)
    {
        $this->db->select('
            sounds.name AS sounds_name,
            plan_sounds_rel.is_done,
            sounds.transcription AS sounds_transcription,
            sounds.id AS sound_id,
            individual_plan.id AS id,
            individual_plan.children_id AS children_id,
            individual_plan.whistling AS whistling,
            individual_plan.hissing AS hissing,
            individual_plan.sonor AS sonor,
            individual_plan.affricate AS affricate,
            individual_plan.other_sounds AS other_sounds,
            children.full_name AS full_name
        ');
        $this->db->join('sounds', 'sounds.id = plan_sounds_rel.sound_id', 'left');
        $this->db->join('individual_plan', 'individual_plan.id = plan_sounds_rel.individual_plan_id', 'left');
        $this->db->join('children', 'children.id = individual_plan.children_id', 'left');
        $this->db->order_by('sounds.id, children.full_name');
        $this->db->where('individual_plan.id', $id);
        $query = $this->db->get('plan_sounds_rel');
        return $query->result_array();
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
                unset($data[$key]['is_done']);
                unset($data[$key]['sounds_transcription']);
                unset($data[$key]['sound_id']);
            }
            $data[$key]['sounds'][$row['sound_id']] = [
                'is_done' => $row['is_done'],
            ];
        }
        return array_values($data)[0];
    }

    public function edit_sounds($id, $sounds)
    {
        $this->db->where('individual_plan_id', $id);
        return $this->db->update_batch('plan_sounds_rel', $sounds, 'sound_id');
    }

    public function delete($id)
    {
        $this->db->delete('plan_sounds_rel', ['individual_plan_id' => $id]);
        return $this->db->delete(self::$table, ['id' => $id]);
    }
}