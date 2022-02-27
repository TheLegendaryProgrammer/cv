using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations.Schema;

#nullable disable

namespace MusorApp3.Models
{
    public partial class CategoriesC : StandardEntity
    {
       
        public virtual Category Category { get; set; }
        [Column("Category"), ForeignKey(nameof(Category))]
        public int? CategoryId { get; set; }
        public virtual Show Show { get; set; }
        [Column("Show"), ForeignKey(nameof(Show))]
        public int? ShowId { get; set; }
    }
}
