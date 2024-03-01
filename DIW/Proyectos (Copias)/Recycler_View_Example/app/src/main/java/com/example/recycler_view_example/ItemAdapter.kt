package com.example.recycler_view_example.adapter

import android.app.Activity
import android.content.Intent
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import androidx.recyclerview.widget.RecyclerView
import com.example.recycler_view_example.R
import com.example.recycler_view_example.SecondActivity
import com.example.recycler_view_example.data.Item

// La clase ItemAdapter se utiliza para enlazar la lista de Items con el RecyclerView
class ItemAdapter (private val items: List<Item>, private val onItemClick: (Item) -> Unit) : RecyclerView.Adapter<ItemAdapter.ItemViewHolder>() {

    // Cada ItemViewHolder es la vista de un elemento
    class ItemViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {
        val text_view: TextView = itemView.findViewById(R.id.text_view)
    }

    // Crear y devolver una instancia de ItemViewHolder
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ItemViewHolder {
        // "Inflar" la vista de un elemento
        val view = LayoutInflater.from(parent.context)
            .inflate(R.layout.item_list, parent, false)
        return ItemViewHolder(view)
    }

    // Vincular datos a las vistas
    override fun onBindViewHolder(holder: ItemViewHolder, position: Int) {
        // Obtener "Item" Actual
        val item = items[position]
        // Poner texto (Strings de la lista de Items)
        holder.text_view.text = item.text

        // OnClickListener para cada elemento en el RecyclerView
        holder.itemView.setOnClickListener {
            onItemClick.invoke(item)
        }

    }

    // Devolver cantidad de elementos en lista de datos
    override fun getItemCount(): Int {
        return items.size
    }

}