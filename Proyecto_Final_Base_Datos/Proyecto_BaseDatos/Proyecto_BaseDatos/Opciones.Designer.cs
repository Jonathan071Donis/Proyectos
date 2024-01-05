namespace proyecto2
{
    partial class Opciones
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.buttonTienda = new System.Windows.Forms.Button();
            this.COMPRAR = new System.Windows.Forms.Button();
            this.label1 = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // buttonTienda
            // 
            this.buttonTienda.BackColor = System.Drawing.Color.Gold;
            this.buttonTienda.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.buttonTienda.ForeColor = System.Drawing.Color.Black;
            this.buttonTienda.Location = new System.Drawing.Point(13, 116);
            this.buttonTienda.Margin = new System.Windows.Forms.Padding(4);
            this.buttonTienda.Name = "buttonTienda";
            this.buttonTienda.Size = new System.Drawing.Size(354, 58);
            this.buttonTienda.TabIndex = 3;
            this.buttonTienda.Text = "Inventario_Productos";
            this.buttonTienda.UseVisualStyleBackColor = false;
            this.buttonTienda.Click += new System.EventHandler(this.buttonTienda_Click);
            // 
            // COMPRAR
            // 
            this.COMPRAR.BackColor = System.Drawing.Color.Gold;
            this.COMPRAR.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.COMPRAR.ForeColor = System.Drawing.Color.Black;
            this.COMPRAR.Location = new System.Drawing.Point(393, 117);
            this.COMPRAR.Margin = new System.Windows.Forms.Padding(4);
            this.COMPRAR.Name = "COMPRAR";
            this.COMPRAR.Size = new System.Drawing.Size(305, 57);
            this.COMPRAR.TabIndex = 4;
            this.COMPRAR.Text = "Venta";
            this.COMPRAR.UseVisualStyleBackColor = false;
            this.COMPRAR.Click += new System.EventHandler(this.COMPRAR_Click);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.BackColor = System.Drawing.Color.LightGray;
            this.label1.Font = new System.Drawing.Font("Segoe Script", 13.8F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.ForeColor = System.Drawing.SystemColors.ActiveCaptionText;
            this.label1.Location = new System.Drawing.Point(84, 30);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(543, 38);
            this.label1.TabIndex = 5;
            this.label1.Text = "ELIJA LA OPCION QUE DESEA EJECUTAR";
            // 
            // Opciones
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.Color.DarkOrange;
            this.ClientSize = new System.Drawing.Size(711, 236);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.COMPRAR);
            this.Controls.Add(this.buttonTienda);
            this.ForeColor = System.Drawing.SystemColors.ActiveBorder;
            this.Margin = new System.Windows.Forms.Padding(4);
            this.Name = "Opciones";
            this.Text = "Menu";
            this.Load += new System.EventHandler(this.Opciones_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion
        private System.Windows.Forms.Button buttonTienda;
        private System.Windows.Forms.Button COMPRAR;
        private System.Windows.Forms.Label label1;
    }
}