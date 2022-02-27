using System;
using System.Collections.Generic;

#nullable disable

namespace MusorApp3.Models
{
    [Serializable()]
    public partial class TvProgram : StandardEntity
    {
        public int Channel { get; set; }
        public string Title { get; set; }
        public string Description { get; set; }
        public DateTime? StartTime { get; set; }
        public int? Length { get; set; }
        public string Categories { get; set; }
        public string CoverLink { get; set; }
        public bool? OnAir { get; set; }
    }
}
