<?php
namespace App\Http\Helper;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        $no = 1;
        foreach ($menus as $key => $item) {
            if ($item->parent_id == $parent_id) {
                $html .= "
                    <tr>
                        <td>{$no}</td>
                        <td>{$char}{$item->name}</td>
                        <td>{$item->updated_at}</td>
                        <td>{$item->description}</td>
                        <td>
                            <a class='btn btn-primary' href='/admin/menu/edit/{$item->id}'>
                                <i class='fa-solid fa-pen-to-square'></i>
                            </a>
                            <a href='#' class='btn btn-danger' onclick='removeRow({$item->id}, \"/admin/menu/destroy\")'>
                                <i class='fa-solid fa-trash'></i>
                            </a>
                        </td>
                    </tr>
                ";
                $no++;
                $html .= self::menu($menus, $item->id, $char . '--');
            }
        }

        return $html;
    }
}
