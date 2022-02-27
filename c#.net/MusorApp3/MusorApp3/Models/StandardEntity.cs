using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Threading.Tasks;

namespace MusorApp3.Models
{
    public class StandardEntity
    {
        [Key]
        public int Id { get; set; }
    }
}
