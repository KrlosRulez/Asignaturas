package com.example.proyecto_u1

import android.graphics.Color
import android.graphics.Paint
import android.view.ContextMenu
import android.view.LayoutInflater
import android.view.Menu
import android.view.MenuInflater
import android.view.MenuItem
import android.view.View
import android.view.ViewGroup
import android.widget.CheckBox
import android.widget.TextView
import android.widget.Toast
import androidx.recyclerview.widget.RecyclerView

class ArticuloAdapter(private var articulos: List<Articulo>, private val listener: OnArticuloContextMenuListener) : RecyclerView.Adapter<ArticuloAdapter.ArticuloViewHolder>() {

    class ArticuloViewHolder(articuloView: View) : RecyclerView.ViewHolder(articuloView) {
        val nombre_articulo: TextView = itemView.findViewById(R.id.nombre_articulo)
        val checkbox_necesario: CheckBox = itemView.findViewById(R.id.checkbox_necesario)
        val checkbox_comprado: CheckBox = itemView.findViewById(R.id.checkbox_comprado)
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int) : ArticuloViewHolder {
        // "Inflar" la vista de un elemento
        val view = LayoutInflater.from(parent.context)
            .inflate(R.layout.carta_articulo, parent, false)
        return ArticuloViewHolder(view)
    }

    override fun onBindViewHolder(holder: ArticuloViewHolder, position: Int) {
        // Obtener "Artículo" Actual
        val articulo_actual = articulos[position]
        // Poner texto (Strings de la lista de Artículos)
        holder.nombre_articulo.text = articulo_actual.nombre

        val context = holder.itemView.context

        // Listener para los checkbox necesario para cambiar el color de los Artículos
        holder.checkbox_necesario.setOnCheckedChangeListener { _, isChecked ->

            holder.checkbox_necesario.isChecked = isChecked

            if (isChecked) {

                articulo_actual.necesario = true    // Marcar cómo necesario
                holder.nombre_articulo.setTextColor(Color.RED) // Cambiar a color verde si está seleccionado
                val toast = Toast.makeText(context, "Articulo Necesario: ${holder.nombre_articulo.text}", Toast.LENGTH_SHORT)
                toast.show()

            } else {

                articulo_actual.necesario = false   // Marcar cómo no necesario
                holder.nombre_articulo.setTextColor(Color.BLACK) // Cambiar a color negro si no está seleccionado
                val toast = Toast.makeText(context, "Artículo ya no Necesario: ${holder.nombre_articulo.text}", Toast.LENGTH_SHORT)
                toast.show()

            }

        }

        // Listener para los checkbox comprado para cambiar el color de los Artículos y tachar
        holder.checkbox_comprado.setOnCheckedChangeListener { _, isChecked ->

            holder.checkbox_comprado.isChecked = isChecked

            if (isChecked) {

                articulo_actual.comprado = true // Marcar cómo comprado
                holder.checkbox_necesario.isClickable = false   // Desativar el checkbox "necesario"
                holder.nombre_articulo.setTextColor(Color.GREEN) // Cambiar a color verde si está seleccionado
                holder.nombre_articulo.paintFlags = Paint.STRIKE_THRU_TEXT_FLAG    // Tachar texto
                val toast = Toast.makeText(context, "Compra Realizada: ${holder.nombre_articulo.text}", Toast.LENGTH_SHORT)
                toast.show()

            } else {

                articulo_actual.comprado = false    // Marcar cómo no comprado
                holder.checkbox_necesario.isClickable = true    // Activar el checkbox "necesario"

                if (holder.checkbox_necesario.isChecked) {

                    holder.nombre_articulo.setTextColor(Color.RED) // Cambiar a color rojo si es necesario

                } else {
                    holder.nombre_articulo.setTextColor(Color.BLACK) // Cambiar a color negro si no es necesario

                }

                holder.nombre_articulo.paintFlags = Paint.LINEAR_TEXT_FLAG // Destachar texto
                val toast = Toast.makeText(context, "Fuera del carrito: ${holder.nombre_articulo.text}", Toast.LENGTH_SHORT)
                toast.show()

            }

        }

        // Menú contextual para cada nombre del artículo
        holder.nombre_articulo.setOnCreateContextMenuListener { menu, _, _ ->
            menu.add(Menu.NONE, 1, Menu.NONE, "Editar").setOnMenuItemClickListener {
                listener.editarArticulo(position)
                true
            }
            menu.add(Menu.NONE, 2, Menu.NONE, "Borrar").setOnMenuItemClickListener {
                listener.borrarArticulo(position)
                true
            }

        }

        // ESTO VA COMO EL CULO

        if (articulo_actual.necesario) {

            holder.checkbox_necesario.isChecked = true

        }

        if (articulo_actual.comprado) {

            holder.checkbox_comprado.isChecked = true

        }

    }

    override fun getItemCount(): Int {
        return articulos.size
    }

    // interfaz para pasar la posición del artículo a editar o borrar
    interface OnArticuloContextMenuListener {
        fun editarArticulo(position: Int)
        fun borrarArticulo(position: Int)
    }

}