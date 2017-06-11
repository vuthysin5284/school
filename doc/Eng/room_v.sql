SELECT
	r.*,
	f.`floor`,
	b.building_name
from room r
inner join `floor` f on f.id = r.floor_id
inner join building b on b.id = r.building_id
where r.is_delete = 0
